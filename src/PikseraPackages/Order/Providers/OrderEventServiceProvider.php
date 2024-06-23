<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/piksera/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Order\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Order\Events\OrderWasCreated;
use PikseraPackages\Order\Events\OrderWasPaid;
use PikseraPackages\Order\Listeners\OrderCreatedListener;
use PikseraPackages\Order\Listeners\OrderWasPaidListener;

class OrderEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        OrderWasCreated::class => [
            OrderCreatedListener::class
        ],
        OrderWasPaid::class => [
            OrderWasPaidListener::class
        ],
    ];

}

