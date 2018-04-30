<?php

namespace ElasticExportPreisRoboterDE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use ElasticExport\Helper\ElasticExportPriceHelper;
use ElasticExport\Helper\ElasticExportStockHelper;
use ElasticExport\Services\FiltrationService;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\DataLayer\Models\Record;
use Plenty\Modules\Item\DataLayer\Models\RecordList;
use Plenty\Modules\Item\Search\Contracts\VariationElasticSearchScrollRepositoryContract;
use Plenty\Plugin\Log\Loggable;

/**
 * Class PreisRoboterDE
 * @package ElasticExportPreisRoboterDE\Generator
 */
class PreisRoboterDE extends CSVPluginGenerator
{
	use Loggable;

	const DELIMITER = "|";

    /**
     * @var ElasticExportCoreHelper $elasticExportHelper
     */
    private $elasticExportHelper;

	/**
	 * @var ElasticExportStockHelper $elasticExportStockHelper
	 */
    private $elasticExportStockHelper;

	/**
	 * @var ElasticExportPriceHelper $elasticExportPriceHelper
	 */
    private $elasticExportPriceHelper;

    /**
     * @var ArrayHelper $arrayHelper
     */
    private $arrayHelper;

	/**
	 * @var array
	 */
    private $deliveryCostCache;

    /**
     * @var FiltrationService
     */
    private $filtrationService;

    /**
     * PreisRoboterDE constructor.
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;

        //set CSV delimiter
        $this->setDelimiter(self::DELIMITER);
    }

    /**
     * @param VariationElasticSearchScrollRepositoryContract $elasticSearch
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($elasticSearch, array $formatSettings = [], array $filter = [])
    {
		$this->elasticExportHelper = pluginApp(ElasticExportCoreHelper::class);
		$this->elasticExportStockHelper = pluginApp(ElasticExportStockHelper::class);
		$this->elasticExportPriceHelper = pluginApp(ElasticExportPriceHelper::class);

		//convert settings to array
		$settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');
		$this->filtrationService = pluginApp(FiltrationService::class, ['settings' => $settings, 'filterSettings' => $filter]);

		$this->setHeader();

		if($elasticSearch instanceof VariationElasticSearchScrollRepositoryContract)
		{
			$limitReached = false;
			$lines = 0;
			do
			{
				if($limitReached === true)
				{
					break;
				}

				$resultList = $elasticSearch->execute();

				if(!is_null($resultList['error']))
				{
					$this->getLogger(__METHOD__)->error('ElasticExportPreisRoboterDE::logs.esError', [
						'Error message ' => $resultList['error'],
					]);
				}

				if(is_array($resultList['documents']) && count($resultList['documents']) > 0)
				{
					foreach($resultList['documents'] as $variation)
					{
						if($lines == $filter['limit'])
						{
							$limitReached = true;
							break;
						}

						if($this->filtrationService->filter($variation))
						{
							continue;
						}

						try
						{
							$this->buildRow($variation, $settings);
							$lines = $lines +1;
						}
						catch(\Throwable $throwable)
						{
							$this->getLogger(__METHOD__)->error('ElasticExportPreisRoboterDE::logs.fillRowError', [
								'Error message ' => $throwable->getMessage(),
								'Error line'    => $throwable->getLine(),
								'VariationId'   => $variation['id']
							]);
						}
					}
				}
			}while ($elasticSearch->hasNext());
		}
    }

	/**
	 * Sets the csv header
	 */
    private function setHeader()
	{
		//add header to csv
		$this->addCSVContent([
			'art_number',
			'art_name',
			'art_price',
			'art_url',
			'art_img_url',
			'art_description',
			'art_versandkosten',
			'art_lieferzeit',
			'art_ean_code',
			'art_pzn',
			'art_producer',
			'art_producer_number',
			'art_baseprice',
		]);
	}

	/**
	 * @param $variation
	 * @param $settings
	 */
	private function buildRow($variation, $settings)
	{
		// Get and set the price and rrp
		$priceList = $this->elasticExportPriceHelper->getPriceList($variation, $settings);

		$price = $priceList['price'];
		$currency = '';

		if((float)$price > 0)
		{
			$currency = $priceList['currency'];
		}

		$deliveryCost = $this->getDeliveryCost($variation, $settings);

		$imageUrl = $this->getImage($variation, $settings);

		$row = [
			'art_number' 		    => $variation['data']['item']['id'],
			'art_name' 		        => $this->elasticExportHelper->getMutatedName($variation, $settings, 256),
			'art_price' 	        => $price,
			'art_url' 		        => $this->elasticExportHelper->getMutatedUrl($variation, $settings, true, false),
			'art_img_url' 	        => $imageUrl,
			'art_description' 	    => $this->elasticExportHelper->getMutatedDescription($variation, $settings, 256),
			'art_versandkosten'     => $deliveryCost,
			'art_lieferzeit' 	    => $this->elasticExportHelper->getAvailability($variation, $settings),
			'art_ean_code'		    => $this->elasticExportHelper->getBarcodeByType($variation, $settings->get('barcode')),
			'art_pzn' 	            => '',
			'art_producer' 	        => $this->elasticExportHelper->getExternalManufacturerName((int)$variation['data']['item']['manufacturer']['id']),
			'art_producer_number'   => $variation['data']['variation']['model'],
			'art_baseprice' 		=> $this->elasticExportPriceHelper->getBasePrice($variation, (float)$price, $settings->get('lang'), '/', false, false, $currency),
		];

		$this->addCSVContent(array_values($row));
	}

	/**
	 * Get the delivery cost.
	 *
	 * @param $variation
	 * @param $settings
	 * @return float|mixed|null|string
	 */
	private function getDeliveryCost($variation, $settings)
	{
		if(!array_key_exists($variation['data']['item']['id'], $this->deliveryCostCache))
		{
			$this->deliveryCostCache = array();

			$deliveryCost = $this->elasticExportHelper->getShippingCost($variation['data']['item']['id'], $settings);

			if(!is_null($deliveryCost))
			{
				$deliveryCost = number_format((float)$deliveryCost, 2, ',', '');
			}
			else
			{
				$deliveryCost = '';
			}

			$this->deliveryCostCache[$variation['data']['item']['id']] = $deliveryCost;
		}
		else
		{
			$deliveryCost = $this->deliveryCostCache[$variation['data']['item']['id']];
		}

		return $deliveryCost;
	}

	private function getImage($variation, $settings)
	{
		$imageList = $this->elasticExportHelper->getImageListInOrder($variation, $settings, 1, ElasticExportCoreHelper::VARIATION_IMAGES);

		if(count($imageList))
		{
			$imageUrl = $imageList[0];
			return $imageUrl;
		}

		return '';
	}
}
