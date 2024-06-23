<?php
namespace PikseraPackages\Modules\SiteStats\Models;

use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;

class StatsUrl extends Base
{
    protected $table = 'stats_urls';
    protected $fillable = [
        'content_id',
        'category_id',
        'url_hash',
        'url',
        'updated_at',
    ];

}
