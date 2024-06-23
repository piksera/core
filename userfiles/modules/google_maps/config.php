<?php

$config = array();
$config['name'] = "Google Maps";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "essentials";
$config['version'] = "0.6";
$config['position'] = 19;


$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\GoogleMaps\\'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\GoogleMaps\Providers\GoogleMapsServiceProvider::class
];

