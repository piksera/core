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

namespace PikseraPackages\ContentData\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use PikseraPackages\ContentData\Listeners\AddContentDataProductListener;
use PikseraPackages\ContentData\Listeners\EditContentDataProductListener;
use PikseraPackages\Content\Events\ContentWasCreated;
use PikseraPackages\Content\Events\ContentWasUpdated;
use PikseraPackages\ContentData\Traits\ContentDataTrait;


/**
 * @deprecated moved to the ContentDataTrait
 */
class ContentDataEventServiceProvider extends EventServiceProvider
{
//    protected $listen = [
//        ContentWasCreated::class => [
//            AddContentDataProductListener::class
//        ],
//        ContentWasUpdated::class => [
//            EditContentDataProductListener::class
//        ]
//    ];
}

