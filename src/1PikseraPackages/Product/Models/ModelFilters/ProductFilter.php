<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace PikseraPackages\Product\Models\ModelFilters;

use PikseraPackages\Content\Models\ModelFilters\ContentFilter;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByAuthor;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByCategory;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByContentData;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByContentFields;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByCustomFields;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByDateBetweenTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByOffersTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByOrdersTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByPage;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByStockTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByPriceTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByTagsTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByTitleTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByTrashedTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByQtyTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByVisibleTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\OrderByTrait;

class ProductFilter extends ContentFilter
{
    use OrderByTrait;
    use FilterByAuthor;
    use FilterByTitleTrait;
    use FilterByTagsTrait;
    use FilterByPage;
    use FilterByCategory;
    use FilterByQtyTrait;
    use FilterByOrdersTrait;
    use FilterByUrlTrait;
    use FilterByPriceTrait;
    use FilterByOffersTrait;
    use FilterByKeywordTrait;
    use FilterByContentData;
    use FilterByContentFields;
    use FilterByCustomFields;
    use FilterByStockTrait;
    use FilterByVisibleTrait;
    use FilterByTrashedTrait;
    use FilterByDateBetweenTrait;

    public function sku($sku)
    {
        $this->contentData(['sku'=>$sku]);
    }

}
