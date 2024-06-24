<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Notification\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Notification\Listeners\UserRegisteredListener;
use PikseraPackages\User\Events\UserWasRegistered;

class NotificationEventServiceProvider extends EventServiceProvider
{
    

}

