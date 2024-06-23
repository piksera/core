<?php

namespace PikseraPackages\Modules\SiteStats\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Cart\Events\AddToCartEvent;
use PikseraPackages\Cart\Events\RemoveFromCartEvent;
use PikseraPackages\Checkout\Events\AddPaymentInfoEvent;
use PikseraPackages\Checkout\Events\AddShippingInfoEvent;
use PikseraPackages\Checkout\Events\BeginCheckoutEvent;
use PikseraPackages\Modules\SiteStats\Listeners\AddPaymentInfoListener;
use PikseraPackages\Modules\SiteStats\Listeners\AddShippingInfoListener;
use PikseraPackages\Modules\SiteStats\Listeners\AddToCartListener;
use PikseraPackages\Modules\SiteStats\Listeners\BeginCheckoutListener;
use PikseraPackages\Modules\SiteStats\Listeners\OrderWasCreatedListener;
use PikseraPackages\Modules\SiteStats\Listeners\OrderWasPaidListener;
use PikseraPackages\Modules\SiteStats\Listeners\RemoveFromCartListener;
use PikseraPackages\Modules\SiteStats\Listeners\UserWasLoggedListener;
use PikseraPackages\Modules\SiteStats\Listeners\UserWasRegisteredListener;
use PikseraPackages\Order\Events\OrderWasCreated;
use PikseraPackages\Order\Events\OrderWasPaid;

class UtmTrackingEventsServiceProvider extends EventServiceProvider
{
    protected $listen = [
        Login::class => [
            UserWasLoggedListener::class
        ],
        Registered::class => [
            UserWasRegisteredListener::class,
        ],
        AddToCartEvent::class => [
            AddToCartListener::class
        ],
        RemoveFromCartEvent::class => [
            RemoveFromCartListener::class
        ],
        BeginCheckoutEvent::class => [
            BeginCheckoutListener::class
        ],
        AddPaymentInfoEvent::class => [
            AddPaymentInfoListener::class
        ],
        AddShippingInfoEvent::class => [
            AddShippingInfoListener::class
        ],
        OrderWasPaid::class => [
            OrderWasPaidListener::class
        ],
//        OrderWasCreated::class => [
//            OrderWasCreatedListener::class
//        ],
    ];


}
