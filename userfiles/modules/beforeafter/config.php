<?php

$config = array();
$config['name'] = "Before/After";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "media";
$config['position'] = 37;
$config['version'] = 1;

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\BeforeAfter'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\BeforeAfter\Providers\BeforeAfterServiceProvider::class
];
