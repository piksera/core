<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/core/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Database\Observers;

use Illuminate\Support\Facades\Cache;

class BaseModelObserver
{
    public function saved($model)
    {
        $this->clearCache($model);
    }

    public function saving($model)
    {
        $this->clearCache($model);
    }

    public function updated($model)
    {
        $this->clearCache($model);
    }

    public function deleted($model)
    {
        $this->clearCache($model);
    }

    public function restored($model)
    {
        $this->clearCache($model);
    }

    public function created($model)
    {
        $this->clearCache($model);
    }

    protected function clearCache($model)
    {

        app()->database_manager->clearCache();
      //  clearcache();
        // TODO
    //Cache::tags($model->table)->flush();
    }
}
