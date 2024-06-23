<?php

$config = array();
$config['name'] = "Przelewy24";
$config['author'] = "Piksera";
$config['ui'] = false;
$config['categories'] = "online shop";
$config['position'] = 136;
$config['type'] = "payment_gateway";



$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Payment\\Providers\\Przelewy24\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Payment\Providers\Przelewy24\Przelewy24ServiceProvider::class,
];
