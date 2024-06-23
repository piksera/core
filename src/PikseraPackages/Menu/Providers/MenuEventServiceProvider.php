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

namespace PikseraPackages\Menu\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Menu\Listeners\AddMenuPageListener;
use PikseraPackages\Menu\Listeners\EditMenuPageListener;
use PikseraPackages\Menu\Events\MenuWasCreated;
use PikseraPackages\Menu\Events\MenuWasUpdated;

class MenuEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        MenuWasCreated::class => [
            AddMenuPageListener::class
        ],
        MenuWasUpdated::class => [
            EditMenuPageListener::class
        ]
    ];
}

