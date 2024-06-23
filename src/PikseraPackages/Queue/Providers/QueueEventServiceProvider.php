<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Queue\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Queue\Events\ProcessQueueEvent;
use PikseraPackages\Queue\Listeners\ProcessQueueListener;
use PikseraPackages\User\Listeners\RecordAuthenticatedLoginListener;
use PikseraPackages\User\Listeners\RecordFailedLoginAttemptListener;
use PikseraPackages\User\Listeners\UserRegisteredListener;

class QueueEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        ProcessQueueEvent::class => [
            ProcessQueueListener::class
        ]

    ];
}
