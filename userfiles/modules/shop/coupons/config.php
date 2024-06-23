<?php
/**
 * Piksera Coupon Module
 * Developed by: Bozhidar Slaveykov
 *
 * @category   Modules
 * @package    Config
 * @author     Bozhidar Slaveykov <selfworksbg@gmail.com>
 * @copyright  2018 Piksera
 */

$config = array();
$config['name'] ="Coupons";
$config['author'] = "Bozhidar Slaveykov";

$config['ui'] = false;
$config['ui_admin'] = true;

$config['categories'] = "online shop";
$config['version'] = "0.6";
$config['position'] = 26;


$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Shop\\Coupons\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Shop\Coupons\Providers\ShopCouponServiceProvider::class,
    \PikseraPackages\Modules\Shop\Coupons\Providers\ShopCouponEventServiceProvider::class
];


