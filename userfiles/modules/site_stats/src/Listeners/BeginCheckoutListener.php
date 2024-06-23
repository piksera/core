<?php
namespace PikseraPackages\Modules\SiteStats\Listeners;

use PikseraPackages\Modules\SiteStats\DTO\UtmEventBeginCheckout;
use PikseraPackages\Modules\SiteStats\Models\StatsEvent;

class BeginCheckoutListener
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
        $utmEvent = new UtmEventBeginCheckout();
        $utmEvent->setInternalData($event);

        StatsEvent::saveNewUtm($utmEvent);
    }
}
