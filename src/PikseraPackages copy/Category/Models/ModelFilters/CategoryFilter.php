<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace PikseraPackages\Category\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use PikseraPackages\Category\Models\ModelFilters\Traits\FilterByAvailableProductsByCategoryTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByStockTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class CategoryFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByAvailableProductsByCategoryTrait;
    use FilterByTitleTrait;
    use FilterByUrlTrait;
    use FilterByKeywordTrait;
    use FilterByStockTrait;

}
