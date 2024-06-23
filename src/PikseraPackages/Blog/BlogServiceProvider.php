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

namespace PikseraPackages\Blog;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Allow to overwrite resource files for this module
        $checkForOverwrite = template_dir() . 'modules/blog/src/resources/views';
        $checkForOverwrite = normalize_path($checkForOverwrite);

        if (is_dir($checkForOverwrite)) {
            View::addNamespace('blog', $checkForOverwrite);
        }

        View::addNamespace('blog', normalize_path((__DIR__) . '/resources/views'));
    }


    public function register()
    {
        $this->loadRoutesFrom((__DIR__) . '/routes/web.php');
    }
}
