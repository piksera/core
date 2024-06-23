<?php

namespace PikseraPackages\Payment\Providers\PayOnDelivery;

use Illuminate\Support\ServiceProvider;

class PayOnDeliveryServiceProvider extends  ServiceProvider
{

    public function register()
    {
        app()->resolving(\PikseraPackages\Payment\PaymentManager::class, function (\PikseraPackages\Payment\PaymentManager $manager) {
            $manager->extend('shop/payments/gateways/pay_on_delivery', function () {
                return new PayOnDeliveryPaymentProvider();
            });
        });
    }
}
