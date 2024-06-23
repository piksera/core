<?php

namespace PikseraPackages\Payment\Providers\Paypal;

use Illuminate\Support\ServiceProvider;

class PaypalServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->resolving(\PikseraPackages\Payment\PaymentManager::class, function (\PikseraPackages\Payment\PaymentManager $manager) {
            $manager->extend('shop/payments/gateways/paypal', function () {
                return new PaypalPaymentProvider();
            });
        });
    }
}
{

}
