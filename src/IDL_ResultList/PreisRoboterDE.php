<?php

namespace ElasticExportPreisRoboterDE\IDL_ResultList;


use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\DataLayer\Models\RecordList;


class PreisRoboterDE
{
    /**
     * @param array $variationIds
     * @param KeyValue $settings
     * @return RecordList|string
     */
    public function getResultList($variationIds, $settings)
    {
        $referrerId = $settings->get('referrerId') ? $settings->get('referrerId') : -1;

        if(is_array($variationIds) && count($variationIds) > 0)
        {
            $searchFilter = array(
                'variationBase.hasId' => array(
                    'id' => $variationIds
                )
            );

            $resultFields = array(
                'itemBase' => array(
                    'id',
                ),

                'variationBase' => array(
                    'id'
                ),

                'variationRetailPrice' => array(
                    'params' => array(
                        'referrerId' => $referrerId,
                    ),
                    'fields' => array(
                        'price',
                    ),
                ),
            );

            $itemDataLayer = pluginApp(ItemDataLayerRepositoryContract::class);
            /**
             * @var ItemDataLayerRepositoryContract $itemDataLayer
             */
            $itemDataLayer = $itemDataLayer->search($resultFields, $searchFilter);
            return $itemDataLayer;
        }
        return '';
    }
}