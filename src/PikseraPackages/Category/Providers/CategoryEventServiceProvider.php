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

namespace PikseraPackages\Category\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\Category\Events\CategoryWasCreated;
use PikseraPackages\Category\Events\CategoryWasDeleted;
use PikseraPackages\Category\Events\CategoryWasUpdated;
use PikseraPackages\Category\Listeners\CategoryListener;

class CategoryEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        CategoryWasCreated::class => [
            CategoryListener::class
        ],
        CategoryWasUpdated::class => [
            CategoryListener::class
        ]
    ];

}
