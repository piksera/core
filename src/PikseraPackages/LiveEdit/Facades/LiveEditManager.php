<?php

namespace PikseraPackages\LiveEdit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PikseraPackages\LiveEdit\Providers\LiveEditManager
 * @mixin \PikseraPackages\LiveEdit\Providers\LiveEditManager
 */
class LiveEditManager extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'LiveEditManager';
    }
}
