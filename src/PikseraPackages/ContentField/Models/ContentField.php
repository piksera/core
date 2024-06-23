<?php

namespace PikseraPackages\ContentField\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\HasCreatedByFieldsTrait;
use PikseraPackages\Multilanguage\Models\Traits\HasMultilanguageTrait;

class ContentField extends Model
{
    use HasCreatedByFieldsTrait;
    use HasMultilanguageTrait;

    protected $table = 'content_fields';
    public $timestamps = true;

    public $translatable = ['value'];

    protected $fillable = [
        'rel_type',
        'rel_id',
        'field',
        'value',
    ];

}
