<?php

namespace PikseraPackages\Payment\Providers\Mollie;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class MolliePaymentProvider extends AbstractPaymentProvider
{
    public $module = 'shop/payments/gateways/omnipay_mollie';
    public $name = 'Mollie';

    use LegacyPaymentProviderHelperTrait;
}
