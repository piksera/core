<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Customer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Customer\Listeners\CreateCustomerFromOrderListener;
use PikseraPackages\Order\Events\OrderWasCreated;

class CustomerEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        OrderWasCreated::class => [
            CreateCustomerFromOrderListener::class
        ]
    ];
}

