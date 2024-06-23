<?php

namespace PikseraPackages\Payment\Providers\PayOnDelivery;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class PayOnDeliveryPaymentProvider extends AbstractPaymentProvider
{
    public $module = 'shop/payments/gateways/pay_on_delivery';
    public $name = 'Pay On Delivery';

    use LegacyPaymentProviderHelperTrait;
}
