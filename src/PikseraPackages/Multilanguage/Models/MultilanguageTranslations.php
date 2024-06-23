<?php
namespace PikseraPackages\Multilanguage\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;

class MultilanguageTranslations extends Model
{
    use CacheableQueryBuilderTrait;

    protected $fillable = [
        'rel_id',
        'rel_type',
        'field_name',
        'field_value',
        'locale'
    ];

    public $timestamps = true;

}
