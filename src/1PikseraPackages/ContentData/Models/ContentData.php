<?php


namespace PikseraPackages\ContentData\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Database\Traits\HasCreatedByFieldsTrait;


class ContentData extends Model
{
    use CacheableQueryBuilderTrait;
    use HasCreatedByFieldsTrait;

    protected $table = 'content_data';

    public $timestamps = true;


    protected $fillable = [
        'rel_type',
        'rel_id',
        'field_value',
        'field_name',
        'content_id',
       // 'edited_by',
       // 'created_by'
    ];



}
