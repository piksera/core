<?php

namespace PikseraPackages\Content\Facades;

use Illuminate\Support\Facades\Facade;



/**
 * @see \PikseraPackages\Content\Services\ContentManager
 * @mixin \PikseraPackages\Content\Services\ContentManager
 *
 */
class ContentManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \PikseraPackages\Content\Services\ContentManager::class;
    }
}

