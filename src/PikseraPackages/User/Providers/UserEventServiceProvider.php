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

namespace PikseraPackages\User\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\User\Listeners\RecordAuthenticatedLoginListener;
use PikseraPackages\User\Listeners\RecordFailedLoginAttemptListener;
use PikseraPackages\User\Listeners\UserRegisteredListener;
use PikseraPackages\User\Notifications\SendEmailVerificationNotificationOnRegister;

class UserEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotificationOnRegister::class,
            UserRegisteredListener::class
        ],
        \Illuminate\Auth\Events\Failed::class => [
            RecordFailedLoginAttemptListener::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            RecordAuthenticatedLoginListener::class,
        ]
    ];
}
