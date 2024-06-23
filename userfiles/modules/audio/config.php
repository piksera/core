<?php

$config = array();
$config['name'] = "Audio";
$config['author'] = "Piksera";
$config['description'] = "Piksera";
$config['website'] = "http://piksera.com/";
$config['help'] = "http://piksera.info/modules/audio";
$config['version'] = "0.20";
$config['ui'] = true;
$config['position'] = 30;
$config['categories'] = "media";

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Audio'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Audio\Providers\AudioServiceProvider::class
];

