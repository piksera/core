<?php

$config = array();
$config['name'] = "Pay on delivery";
$config['author'] = "D.Velev (colocation.bg)";
$config['author.2'] = "Piksera";
$config['ui'] = false;
$config['categories'] = "online shop";
$config['position'] = 130;
$config['type'] = "payment_gateway";

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Payment\\Providers\\PayOnDelivery\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Payment\Providers\PayOnDelivery\PayOnDeliveryServiceProvider::class,
];
