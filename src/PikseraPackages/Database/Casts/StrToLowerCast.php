<?php

namespace PikseraPackages\Database\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class StrToLowerCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
         return strtolower($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        return [$key => strtolower($value)];
    }
}
