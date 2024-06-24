<?php
namespace PikseraPackages\Multilanguage\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;

class MultilanguageSupportedLocales extends Model
{
    public $timestamps = false;
    use CacheableQueryBuilderTrait;
}
