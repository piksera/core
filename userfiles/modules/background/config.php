<?php

$config = array();
$config['name'] = "Background Image";
$config['author'] = "Piksera";
$config['description'] = "Piksera";
$config['website'] = "http://piksera.com/";
$config['help'] = "http://piksera.com/modules/background";
$config['version'] = 1.2;
$config['ui'] = false;
$config['position'] = 333;
$config['categories'] = "media";

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Background'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Background\Providers\BackgroundImageServiceProvider::class
];
