<?php

namespace PikseraPackages\Payment\Providers;

class NoPaymentProvider extends AbstractPaymentProvider
{
    public function name() : string
    {
        return 'No payment provider';
    }

}
