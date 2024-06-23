<?php
namespace PikseraPackages\Modules\SiteStats\Listeners;

use PikseraPackages\Modules\SiteStats\DTO\UtmEventAddToCart;
use PikseraPackages\Modules\SiteStats\Models\StatsEvent;

class AddToCartListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // ...
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {

        $utmEvent = new UtmEventAddToCart();
        $utmEvent->setInternalData($event);

        StatsEvent::saveNewUtm($utmEvent);

    }
}
