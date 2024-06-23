<?php

namespace PikseraPackages\Modules\Shop\Coupons\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as EventServiceProviderBase;
use PikseraPackages\Modules\Shop\Coupons\Listeners\OrderWasCreatedCouponCodeLogger;
use PikseraPackages\Order\Events\OrderWasCreated;

class ShopCouponEventServiceProvider extends EventServiceProviderBase
{
    protected $listen = [
        OrderWasCreated::class => [
            OrderWasCreatedCouponCodeLogger::class
        ],
    ];
}
