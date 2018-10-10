<?php

namespace ElasticExportPreisRoboterDE\ResultField;

use ElasticExport\DataProvider\ResultFieldDataProvider;
use Plenty\Modules\DataExchange\Contracts\ResultFields;
use Plenty\Modules\DataExchange\Models\FormatSetting;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\Search\Mutators\BarcodeMutator;
use Plenty\Modules\Item\Search\Mutators\ImageMutator;
use Plenty\Modules\Cloud\ElasticSearch\Lib\Source\Mutator\BuiltIn\LanguageMutator;
use Plenty\Modules\Item\Search\Mutators\KeyMutator;
use Plenty\Modules\Item\Search\Mutators\SkuMutator;
use Plenty\Modules\Item\Search\Mutators\DefaultCategoryMutator;
use Plenty\Plugin\Log\Loggable;

/**
 * Class PreisRoboterDE
 * @package ElasticExport\ResultFields
 */
class PreisRoboterDE extends ResultFields
{
	use Loggable;
	
    /**
	 * @var ArrayHelper $arrayHelper
	 */
    private $arrayHelper;

    /**
     * Billiger constructor.
     * @param ArrayHelper $arrayHelper
     */
    public function __construct(ArrayHelper $arrayHelper)
    {
        $this->arrayHelper = $arrayHelper;
    }

    public function generateResultFields(array $formatSettings = []):array
    {
        $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

        $reference = $settings->get('referrerId') ? $settings->get('referrerId') : -1;

        //Mutator
        /**
         * @var ImageMutator $imageMutator
         */
        $imageMutator = pluginApp(ImageMutator::class);
        if($imageMutator instanceof ImageMutator)
        {
            $imageMutator->addMarket($reference);
        }
        /**
         * @var LanguageMutator $languageMutator
         */
		$languageMutator = pluginApp(LanguageMutator::class, ['languages' => [$settings->get('lang')]]);

        /**
         * @var DefaultCategoryMutator $defaultCategoryMutator
         */
        $defaultCategoryMutator = pluginApp(DefaultCategoryMutator::class);
        if($defaultCategoryMutator instanceof DefaultCategoryMutator)
        {
            $defaultCategoryMutator->setPlentyId($settings->get('plentyId'));
        }

		/**
		 * @var BarcodeMutator $barcodeMutator
		 */
		$barcodeMutator = pluginApp(BarcodeMutator::class);
		if($barcodeMutator instanceof BarcodeMutator)
		{
			$barcodeMutator->addMarket($reference);
		}

		/**
		 * @var KeyMutator
		 */
		$keyMutator = pluginApp(KeyMutator::class);

		if($keyMutator instanceof KeyMutator)
		{
			$keyMutator->setKeyList($this->getKeyList());
			$keyMutator->setNestedKeyList($this->getNestedKeyList());
		}

		/**
		 * @var DefaultCategoryMutator $defaultCategoryMutator
		 */
		$defaultCategoryMutator = pluginApp(DefaultCategoryMutator::class);

		if ($defaultCategoryMutator instanceof DefaultCategoryMutator) {
			$defaultCategoryMutator->setPlentyId($settings->get('plentyId'));
		}

		$resultFieldHelper = pluginApp(ResultFieldDataProvider::class);
		if ($resultFieldHelper instanceof ResultFieldDataProvider) {
			$resultFields = $resultFieldHelper->getResultFields($settings);
		}

		if (isset($resultFields) && is_array($resultFields) && count($resultFields)) {
			$fields[0] = $resultFields;
			$fields[1] = [
				$languageMutator,
				$defaultCategoryMutator,
				$barcodeMutator,
				$keyMutator
			];

			if($reference != -1)
			{
				$fields[1][] = $imageMutator;
			}
		}
		else {
			$this->getLogger(__METHOD__)->critical('ElasticExportPreisRoboterDE::log.resultFieldError');
			exit();
		}

        return $fields;
    }

	/**
	 * @return array
	 */
	private function getKeyList()
	{
		return [
			// Item
			'item.id',
			'item.manufacturer.id',

			// Variation
			'variation.availability.id',
			'variation.model',
			'variation.stockLimitation',

			// Unit
			'unit.content',
			'unit.id',
		];
	}

	/**
	 * @return array
	 */
	private function getNestedKeyList()
	{
		return [
			'keys' => [
				// Barcodes
				'barcodes',

				// Default categories
				'defaultCategories',

				// Images
				'images.all',
				'images.item',
				'images.variation',

				// Texts
				'texts',
			],

			'nestedKeys' => [
				// Barcodes
				'barcodes' => [
					'code',
					'type'
				],

				// Default categories
				'defaultCategories' => [
					'id'
				],

				// Images
				'images.all' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],
				'images.item' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],
				'images.variation' => [
					'urlMiddle',
					'urlPreview',
					'urlSecondPreview',
					'url',
					'path',
					'position',
				],

				// texts
				'texts' => [
					'urlPath',
					'name1',
					'name2',
					'name3',
					'shortDescription',
					'description',
					'technicalData',
				],
			]
		];
	}
}
