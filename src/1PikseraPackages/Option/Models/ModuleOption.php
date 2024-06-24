<?php
namespace PikseraPackages\Option\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Casts\ReplaceSiteUrlCast;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Multilanguage\Models\Traits\HasMultilanguageTrait;

class ModuleOption extends Model
{

    protected $fillable=['option_group','option_value','option_key','module'];

    public $cacheTagsToClear = ['global','content','frontend'];

    protected $table = 'options';

    public $translatable = [];

    use HasMultilanguageTrait;
    use CacheableQueryBuilderTrait;

    protected $casts = [
        'option_value' => ReplaceSiteUrlCast::class, //Casts like that: http://lorempixel.com/400/200/ =>  {SITE_URL}400/200/
    ];

}
