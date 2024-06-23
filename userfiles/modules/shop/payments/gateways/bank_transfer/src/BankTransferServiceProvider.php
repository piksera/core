<?php

namespace PikseraPackages\Payment\Providers\BankTransfer;

use Illuminate\Support\ServiceProvider;

class BankTransferServiceProvider extends ServiceProvider

{
    public function register()
    {
        app()->resolving(\PikseraPackages\Payment\PaymentManager::class, function (\PikseraPackages\Payment\PaymentManager $manager) {
            $manager->extend('shop/payments/gateways/bank_transfer', function () {
                return new BankTransferPaymentProvider();
            });
        });
    }

}
