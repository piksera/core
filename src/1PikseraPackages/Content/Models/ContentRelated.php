<?php

namespace PikseraPackages\Content\Models;


use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Database\Traits\MaxPositionTrait;


class ContentRelated extends Model
{
    use MaxPositionTrait;

    use CacheableQueryBuilderTrait;

    public $cacheTagsToClear = ['content', 'categories'];

    protected $table = 'content_related';

    protected $fillable = [
        'content_id',
        'related_content_id',
        'position'
    ];

}
