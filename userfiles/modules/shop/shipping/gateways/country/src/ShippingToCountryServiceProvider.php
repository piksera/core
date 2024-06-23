<?php


namespace PikseraPackages\Shop\Shipping\Gateways\Country;

use Illuminate\Support\ServiceProvider;


class ShippingToCountryServiceProvider extends ServiceProvider
{
    public function register()
    {
         app()->resolving(\PikseraPackages\Shipping\ShippingManager::class, function (\PikseraPackages\Shipping\ShippingManager $shippingManager) {
            $shippingManager->extend('shop/shipping/gateways/country', function () {
                return new ShippingToCountry();
            });
        });
    }
}
