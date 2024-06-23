<?php
namespace PikseraPackages\Tax\Models;

use Illuminate\Database\Eloquent\Model;
use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;


class TaxType extends Model
{
    use CacheableQueryBuilderTrait;

    protected $table = 'tax_types';

    protected $fillable = [
        'name',
        'type',
        'rate',
        'compound_tax',
        'collective_tax',
        'description'
    ];

    protected $casts = [
        'percent' => 'float'
    ];

}
