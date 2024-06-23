<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace PikseraPackages\Cart\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class CartFilter extends ModelFilter
{
    use FilterByTitleTrait;
    use FilterByUrlTrait;
    use FilterByKeywordTrait;
}
