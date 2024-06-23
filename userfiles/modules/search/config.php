<?php

$config = array();
$config['name'] = "Search";
$config['author'] = "Piksera";
$config['description'] = "Module to search for content";
$config['website'] = "http://piksera.com/";
$config['help'] = "http://piksera.info/modules/search";
$config['version'] = 0.2;
$config['ui'] = true;
$config['position'] = 34;
$config['categories'] = "miscellaneous";



$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Search'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Search\Providers\SearchServiceProvider::class
];

