<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 10/15/2020
 * Time: 3:25 PM
 */

namespace PikseraPackages\User\Models\ModelFilters;

use EloquentFilter\ModelFilter;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByDateBetweenTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByKeywordTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\FilterByUrlTrait;
use PikseraPackages\Content\Models\ModelFilters\Traits\OrderByTrait;
use PikseraPackages\Helper\XSSClean;
use PikseraPackages\Multilanguage\Models\MultilanguageTranslations;
use PikseraPackages\Multilanguage\MultilanguageHelpers;

class UserFilter extends ModelFilter
{
    use OrderByTrait;
    use FilterByUrlTrait;
    use FilterByDateBetweenTrait;

    public function keyword($keyword)
    {
        $model = $this->getModel();
        $table = $model->getTable();

        $keyword = trim($keyword);

        $this->query->where('id', intval($keyword));
        $this->query->orWhere($table.'.username', 'LIKE', '%' . $keyword . '%');
        $this->query->orWhere($table.'.email', 'LIKE', '%' . $keyword . '%');

        $this->query->orWhere($table.'.first_name', 'LIKE', '%' . $keyword . '%');
        $this->query->orWhere($table.'.last_name', 'LIKE', '%' . $keyword . '%');

        $keywordExp = explode(' ', $keyword);
        if (isset($keywordExp[0]) && isset($keywordExp[1])) {
            $this->query->orWhere($table.'.first_name', 'LIKE', '%' . $keywordExp[0] . '%');
            $this->query->orWhere($table.'.last_name', 'LIKE', '%' . $keywordExp[1] . '%');
        }

        $this->query->orWhere($table.'.phone', 'LIKE', '%' . $keyword . '%');

        return $this->query;
    }

    public function isAdmin($isAdmin)
    {
        return $this->query->where('is_admin', $isAdmin);
    }
}
