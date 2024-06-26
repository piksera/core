<?php

$config = array();
$config['name'] = "Categories Images";
$config['author'] = "Piksera";
$config['version'] = "0.1";
$config['ui'] = true;
$config['ui_admin'] = false;
$config['is_system'] = true;
$config['position'] = 51;
$config['categories'] = "miscellaneous";

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Categories\CategoryImages'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Categories\CategoryImages\Providers\CategoryImagesServiceProvider::class
];
