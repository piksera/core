<?php


namespace PikseraPackages\ContentDataVariant\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;
use PikseraPackages\Database\Traits\HasCreatedByFieldsTrait;

class ContentDataVariant extends Model
{
    use CacheableQueryBuilderTrait;

    protected $table = 'content_data_variants';

    public $timestamps = true;


    protected $fillable = [
        'rel_type',
        'rel_id',
        'custom_field_id',
        'custom_field_value_id',
    ];

}
