<?php
namespace PikseraPackages\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Casts\ReplaceSiteUrlCast;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Multilanguage\Models\Traits\HasMultilanguageTrait;

class Menu extends Model
{
    use CacheableQueryBuilderTrait;
    use HasMultilanguageTrait;

    protected $casts = [
         'url' => ReplaceSiteUrlCast::class,
         'default_image' => ReplaceSiteUrlCast::class,
         'rollover_image' => ReplaceSiteUrlCast::class,
    ];

    public $fillable = [
        "id",
        "title",
        "item_type",
        "parent_id",
        "content_id",
        "categories_id",
        "position",
        "is_active",
        "auto_populate",
        "description",
        "url",
        "url_target",
        "size",
        "default_image",
        "rollover_image"
    ];

    public $translatable = ['title','url'];

    public $cacheTagsToClear = ['menus','repositories','content'];
}
