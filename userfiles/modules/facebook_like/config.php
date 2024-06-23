<?php

$config = array();
$config['name'] ="Facebook Like";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "social";
$config['version'] = 0.06;
$config['position'] = 10;


$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\FacebookLike'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\FacebookLike\Providers\FacebookLikeServiceProvider::class
];

