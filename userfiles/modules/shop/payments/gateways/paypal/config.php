<?php

$config = array();
$config['name'] = "Paypal Express";
$config['author'] = "Piksera";
$config['ui'] = false;
$config['categories'] = "online shop";
$config['position'] = 110;
$config['type'] = "payment_gateway";



$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Payment\\Providers\\Paypal\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Payment\Providers\Paypal\PaypalServiceProvider::class,
];
