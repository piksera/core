<?php

$config = array();
$config['name'] = "Stripe payment";
$config['author'] = "Piksera";
$config['ui'] = false;
$config['categories'] = "online shop";
$config['position'] = 132;
$config['type'] = "payment_gateway";


$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Payment\\Providers\\Stripe\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Payment\Providers\Stripe\StripeServiceProvider::class,
];
