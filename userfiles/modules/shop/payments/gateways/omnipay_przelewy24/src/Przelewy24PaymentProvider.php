<?php

namespace PikseraPackages\Payment\Providers\Przelewy24;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class Przelewy24PaymentProvider extends AbstractPaymentProvider
{
    public $module = 'shop/payments/gateways/omnipay_przelewy24';
    public $name = 'Przelewy24';

    use LegacyPaymentProviderHelperTrait;
}
