<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:42 PM
 */

namespace PikseraPackages\Content\Models\ModelFilters\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Config;
use PikseraPackages\Helper\XSSClean;
use PikseraPackages\Multilanguage\Models\MultilanguageTranslations;
use PikseraPackages\Multilanguage\MultilanguageHelpers;

trait FilterByCategory
{
    public function category($categoryIds = false)
    {

        if ($categoryIds) {
            $this->query->whereCategoryIds($categoryIds);
        }
    }

}
