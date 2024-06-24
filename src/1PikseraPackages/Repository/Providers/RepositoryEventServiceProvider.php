<?php

namespace PikseraPackages\Repository\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;

use PikseraPackages\Content\Events\ContentWasCreated;
use PikseraPackages\Content\Events\ContentWasUpdated;

class RepositoryEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        ContentWasCreated::class => [
        //    AddContentDataProductListener::class
        ],
        ContentWasUpdated::class => [
        //    EditContentDataProductListener::class
        ]
    ];
}

