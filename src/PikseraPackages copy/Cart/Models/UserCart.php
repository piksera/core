<?php
/*
 * This file is part of the Microweber framework.
 *
 * (c) Microweber CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Cart\Models;

use PikseraPackages\Cart\Scopes\UserCartScope;

class UserCart extends Cart
{
    protected static function boot()
    {
        parent::boot();
        return static::addGlobalScope(new UserCartScope());
    }
}
