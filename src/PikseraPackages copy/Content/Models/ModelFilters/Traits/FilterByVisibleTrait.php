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

trait FilterByVisibleTrait
{
    public function visible($isVisible = 1)
    {
        if ($isVisible == 'any') {
            return;
        }

        if ($isVisible == 'published') {
            $isVisible = 1;
        }

        if ($isVisible == 'unpublished') {
            $isVisible = 0;
        }

        $isVisible = intval($isVisible);
        $this->where('content.is_active', $isVisible);
    }
}
