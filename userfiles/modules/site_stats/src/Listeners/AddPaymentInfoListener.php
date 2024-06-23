<?php
namespace PikseraPackages\Modules\SiteStats\Listeners;

use PikseraPackages\Modules\SiteStats\DTO\UtmEventAddPaymentInfo;
use PikseraPackages\Modules\SiteStats\Models\StatsEvent;

class AddPaymentInfoListener
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
        $utmEvent = new UtmEventAddPaymentInfo();
        $utmEvent->setInternalData($event);

        StatsEvent::saveNewUtm($utmEvent);

    }
}
