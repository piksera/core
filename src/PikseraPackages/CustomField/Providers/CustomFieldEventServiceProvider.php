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

namespace PikseraPackages\CustomField\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\CustomField\Listeners\AddCustomFieldProductListener;
use PikseraPackages\CustomField\Listeners\EditCustomFieldProductListener;
use PikseraPackages\Content\Events\ContentWasCreated;
use PikseraPackages\Content\Events\ContentWasUpdated;

class CustomFieldEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ContentWasCreated::class => [
            AddCustomFieldProductListener::class
        ],
        ContentWasUpdated::class => [
            EditCustomFieldProductListener::class
        ]
    ];
}

