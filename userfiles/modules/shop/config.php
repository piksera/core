<?php
$config = array();
$config['name'] = "Online shop";
$config['author'] = "Piksera";
$config['ui_admin'] = true;
$config['ui'] = true;
$config['categories'] = "store";
$config['position'] = 200;
$config['version'] = 0.4;

$config['permissions'] = [
    'index' => 'module.admin.shop.index',
    'create' => 'module.admin.shop.create',
    'edit' => 'module.admin.shop.edit',
    'destroy' => 'module.admin.shop.destroy'
];

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Shop'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Shop\ShopServiceProvider::class,
    \PikseraPackages\Modules\Shop\Providers\ShopServiceProvider::class
];

