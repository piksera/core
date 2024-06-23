<?php
$config = array();
$config['name'] = "PDF";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "miscellaneous";
$config['position'] = 40;
$config['version'] = "1.1";


$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Pdf'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Pdf\Providers\PdfServiceProvider::class
];

