<?php
$config = array();
$config['name'] = "Sharer";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "social";
$config['position'] = 210;
$config['version'] = 1.3;

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Sharer'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Sharer\Providers\SharerServiceProvider::class
];

