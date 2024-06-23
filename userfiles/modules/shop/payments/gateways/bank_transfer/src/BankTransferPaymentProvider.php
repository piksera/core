<?php

namespace PikseraPackages\Payment\Providers\BankTransfer;

use PikseraPackages\Payment\Providers\AbstractPaymentProvider;
use PikseraPackages\Payment\Traits\LegacyPaymentProviderHelperTrait;

class BankTransferPaymentProvider extends AbstractPaymentProvider
{
    use LegacyPaymentProviderHelperTrait;
    public $module = 'shop/payments/gateways/bank_transfer';
    public $name = 'Bank Transfer';


}
