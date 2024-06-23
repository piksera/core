<?php
namespace PikseraPackages\Modules\SiteStats\Listeners;

use PikseraPackages\Modules\SiteStats\DTO\UtmEvent;
use PikseraPackages\Modules\SiteStats\DTO\UtmEventSignUp;
use PikseraPackages\Modules\SiteStats\DispatchLocalTracking;
use PikseraPackages\Modules\SiteStats\Models\StatsEvent;
use PikseraPackages\Modules\SiteStats\UtmVisitorData;

class UserWasRegisteredLocalListener
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
        $localTracking = new DispatchLocalTracking();
        $localTracking->userId = $event->user->id;
        $localTracking->dispatch();
    }
}
