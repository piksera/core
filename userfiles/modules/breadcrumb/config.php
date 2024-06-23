<?php

$config = array();
$config['name'] ="Breadcrumb";
$config['description'] = "Breadcrumb navigation";
$config['author'] = "Piksera";
$config['ui'] = true;
$config['categories'] = "miscellaneous";
$config['position'] = 54;
$config['version'] = 0.3;

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Breadcrumb'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Breadcrumb\Providers\BreadcrumbServiceProvider::class
];

