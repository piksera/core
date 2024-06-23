<?php

namespace PikseraPackages\Payment\Providers\Paypal;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class PaypalPaymentProvider extends AbstractPaymentProvider
{
    public $module = 'shop/payments/gateways/paypal';
    public $name = 'Paypal';

    use LegacyPaymentProviderHelperTrait;

}
