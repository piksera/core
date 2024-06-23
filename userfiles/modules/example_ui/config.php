<?php

$config = array();
$config['name'] = "Examples of Piksera UI";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = false;
$config['ui_admin'] = false;
$config['categories'] = "miscellaneous";
$config['position'] = 999;
$config['version'] = "0.2";

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\ExampleUi'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\ExampleUi\Providers\ExampleUiServiceProvider::class
];
