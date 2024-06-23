<?php


namespace PikseraPackages\Shop\Shipping\Gateways\Pickup;

use Illuminate\Support\ServiceProvider;


class PickupServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->resolving(\PikseraPackages\Shipping\ShippingManager::class, function (\PikseraPackages\Shipping\ShippingManager $shippingManager) {
            $shippingManager->extend('shop/shipping/gateways/pickup', function () {

                return new PickupDriver();
            });
        });
    }
}
