<?php

namespace PikseraPackages\Payment\Providers\Stripe;

use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->resolving(\PikseraPackages\Payment\PaymentManager::class, function (\PikseraPackages\Payment\PaymentManager $manager) {
            $manager->extend('shop/payments/gateways/omnipay_stripe', function () {
                return new StripePaymentProvider();
            });
        });
    }
}
