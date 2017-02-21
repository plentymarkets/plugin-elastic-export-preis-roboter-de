<?php

namespace ElasticExportPreisRoboterDE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use Plenty\Modules\DataExchange\Contracts\CSVGenerator;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\DataLayer\Models\Record;
use Plenty\Modules\Item\DataLayer\Models\RecordList;

/**
 * Class PreisRoboterDE
 * @package ElasticExportPreisRoboterDE\Generator
 */
class PreisRoboterDE extends CSVGenerator
{
    /**
     * @var ElasticExportCoreHelper $elasticExportHelper
     */
    private $elasticExportHelper;

    /**
     * @var ArrayHelper $arrayHelper
     */
    private $arrayHelper;

    /**
     * @var array
     */
    private $idlVariations = array();

    /**
     * PreisRoboterDE constructor.
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;

        //set CSV delimiter
        $this->setDelimiter("|");
    }

    /**
     * @param array $resultData
     * @param array $formatSettings
     */
    protected function generateContent($resultData, array $formatSettings = [])
    {
        if(is_array($resultData['documents']) && count($resultData['documents']) > 0)
        {
            $this->elasticExportHelper = pluginApp(ElasticExportCoreHelper::class);
            //convert settings to array
            $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

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

            //Create a List of all VariationIds
            $variationIdList = array();
            foreach($resultData['documents'] as $variation)
            {
                $variationIdList[] = $variation['id'];
            }

            //Get the missing fields in ES from IDL
            if(is_array($variationIdList) && count($variationIdList) > 0)
            {
                /**
                 * @var \ElasticExportPreisRoboterDE\IDL_ResultList\PreisRoboterDE $idlResultList
                 */
                $idlResultList = pluginApp(\ElasticExportPreisRoboterDE\IDL_ResultList\PreisRoboterDE::class);
                $idlResultList = $idlResultList->getResultList($variationIdList, $settings);
            }

            //Creates an array with the variationId as key to surpass the sorting problem
            if(isset($idlResultList) && $idlResultList instanceof RecordList)
            {
                $this->createIdlArray($idlResultList);
            }

            foreach($resultData['documents'] as $item)
            {
                $deliveryCost = $this->elasticExportHelper->getShippingCost($item['data']['item']['id'], $settings);

                if(!is_null($deliveryCost))
                {
                    $deliveryCost = number_format((float)$deliveryCost, 2, ',', '');
                }
                else
                {
                    $deliveryCost = '';
                }

                $row = [
                    'art_number' 		    => $item['data']['item']['id'],
                    'art_name' 		        => $this->elasticExportHelper->getName($item, $settings, 256),
                    'art_price' 	        => number_format((float)$this->idlVariations[$item['id']]['variationRetailPrice.price'], 2, '.', ''),
                    'art_url' 		        => $this->elasticExportHelper->getUrl($item, $settings, true, false),
                    'art_img_url' 	        => $this->elasticExportHelper->getMainImage($item, $settings),
                    'art_description' 	    => $this->elasticExportHelper->getDescription($item, $settings, 256),
                    'art_versandkosten'     => $deliveryCost,
                    'art_lieferzeit' 	    => $this->elasticExportHelper->getAvailability($item, $settings),
                    'art_ean_code'		    => $this->elasticExportHelper->getBarcodeByType($item, $settings->get('barcode')),
                    'art_pzn' 	            => '',
                    'art_producer' 	        => $this->elasticExportHelper->getExternalManufacturerName((int)$item['data']['item']['manufacturer']['id']),
                    'art_producer_number'   => $item['data']['variation']['model'],
                    'art_baseprice' 		=> $this->elasticExportHelper->getBasePrice($item, $this->idlVariations),
                ];

                $this->addCSVContent(array_values($row));
            }
        }
    }

    /**
     * @param RecordList $idlResultList
     */
    private function createIdlArray($idlResultList)
    {
        if($idlResultList instanceof RecordList)
        {
            foreach($idlResultList as $idlVariation)
            {
                if($idlVariation instanceof Record)
                {
                    $this->idlVariations[$idlVariation->variationBase->id] = [
                        'itemBase.id' => $idlVariation->itemBase->id,
                        'variationBase.id' => $idlVariation->variationBase->id,
                        'itemPropertyList' => $idlVariation->itemPropertyList,
                        'variationStock.stockNet' => $idlVariation->variationStock->stockNet,
                        'variationRetailPrice.price' => $idlVariation->variationRetailPrice->price,
                        'variationRecommendedRetailPrice.price' => $idlVariation->variationRecommendedRetailPrice->price,
                    ];
                }
            }
        }
    }
}
