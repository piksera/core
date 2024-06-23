<?php

$config = array();
$config['name'] = "Social Links";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "social";
$config['position'] = 9;
$config['version'] = 1;



$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\SocialLinks'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\SocialLinks\Providers\SocialLinksServiceProvider::class
];
