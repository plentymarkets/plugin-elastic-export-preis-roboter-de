<?php

namespace ElasticExportPreisRoboterDE;

use Plenty\Modules\DataExchange\Services\ExportPresetContainer;
use Plenty\Plugin\DataExchangeServiceProvider;

class ElasticExportPreisRoboterDEServiceProvider extends DataExchangeServiceProvider
{
    public function register()
    {

    }

    public function exports(ExportPresetContainer $container)
    {
        $container->add(
            'PreisRoboterDE-Plugin',
            'ElasticExportPreisRoboterDE\ResultField\PreisRoboterDE',
            'ElasticExportPreisRoboterDE\Generator\PreisRoboterDE',
            'ElasticExportPreisRoboterDE\Filter\PreisRoboterDE',
            true
        );
    }
}