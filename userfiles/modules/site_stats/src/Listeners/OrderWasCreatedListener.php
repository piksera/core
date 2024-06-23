<?php
namespace PikseraPackages\Modules\SiteStats\Listeners;

use PikseraPackages\Modules\SiteStats\DTO\UtmEventConversion;
use PikseraPackages\Modules\SiteStats\DTO\UtmEventPurchase;
use PikseraPackages\Modules\SiteStats\Models\StatsEvent;

class OrderWasCreatedListener
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

    }
}
