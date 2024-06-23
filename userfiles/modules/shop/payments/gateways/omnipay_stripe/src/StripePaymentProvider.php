<?php

namespace PikseraPackages\Payment\Providers\Stripe;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class StripePaymentProvider extends AbstractPaymentProvider
{
    public $module = 'shop/payments/gateways/omnipay_stripe';
    public $name = 'Stripe';

    use LegacyPaymentProviderHelperTrait;
}
