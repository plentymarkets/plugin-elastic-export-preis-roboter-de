<?php

namespace ElasticExportPreisRoboterDE\Filter;

use Plenty\Modules\DataExchange\Contracts\FiltersForElasticSearch;

use Plenty\Plugin\Application;

class PreisRoboterDE extends FiltersForElasticSearch
{
    /**
     * @var Application $app
     */
    private $app;


    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return array
     */
    public function generateElasticSearchFilter():array
    {
        $searchFilter = array();

        return $searchFilter;
    }
}