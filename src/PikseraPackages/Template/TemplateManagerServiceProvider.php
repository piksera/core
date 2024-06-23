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

namespace PikseraPackages\Template;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Template\Http\Livewire\Admin\AdminTemplateUpdateModal;
use PikseraPackages\Template\Http\Livewire\Admin\LiveEditTemplateSettingsSidebar;

class TemplateManagerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Livewire::component('admin-template-update-modal', AdminTemplateUpdateModal::class);
        Livewire::component('live-edit-template-settings-sidebar', LiveEditTemplateSettingsSidebar::class);
    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');


        /**
         * @property \PikseraPackages\Template\TemplateManager    $template_manager
         */
        $this->app->singleton('template_manager', function ($app) {
            return new TemplateManager();
        });

        /**
         * @property \PikseraPackages\Template\layoutsManager    $layouts_manager
         */
        $this->app->singleton('layouts_manager', function ($app) {
            return new LayoutsManager();
        });

        /**
         * @property \PikseraPackages\Template\Template    $template
         */
        $this->app->singleton('template', function ($app) {
            return new Template();
        });

        View::addNamespace('template', __DIR__.'/resources/views');

    }
}
