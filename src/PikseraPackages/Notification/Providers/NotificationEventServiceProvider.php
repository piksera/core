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

namespace PikseraPackages\Notification\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Notification\Listeners\UserRegisteredListener;
use PikseraPackages\User\Events\UserWasRegistered;

class NotificationEventServiceProvider extends EventServiceProvider
{


}

