<?php
$config = array();
$config['name'] = "TOC";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['ui_admin'] = false;
$config['categories'] = "content";
$config['position'] = 39;
$config['version'] = 1.0;

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Toc'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Toc\Providers\TocServiceProvider::class
];
