<?php

namespace PikseraPackages\Payment\Providers\Mollie;

use Illuminate\Support\ServiceProvider;

class MollieServiceProvider extends ServiceProvider
{

    public function register()
    {
        app()->resolving(\PikseraPackages\Payment\PaymentManager::class, function (\PikseraPackages\Payment\PaymentManager $manager) {
            $manager->extend('shop/payments/gateways/omnipay_mollie', function () {
                return new MolliePaymentProvider();
            });
        });
    }
}
