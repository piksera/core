<?php


namespace rating;


use PikseraPackages\Database\Traits\CacheableQueryBuilderTrait;

class Rating extends \Illuminate\Database\Eloquent\Model
{
    use CacheableQueryBuilderTrait;
    public $table = 'rating';

}
