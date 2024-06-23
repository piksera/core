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

namespace PikseraPackages\LiveEdit\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class LiveEditRouteServiceProvider extends RouteServiceProvider
{


    public function register()
    {

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/live_edit.php');
        parent::register();

    }
}
