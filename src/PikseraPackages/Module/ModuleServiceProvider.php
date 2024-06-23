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

namespace PikseraPackages\Module;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Admin\Events\ServingAdmin;
use PikseraPackages\Admin\Facades\AdminManager;
use PikseraPackages\Marketplace\Http\Livewire\Admin\Marketplace;
use PikseraPackages\Module\Http\Livewire\Admin\AskForModuleUninstallModal;
use PikseraPackages\Module\Http\Livewire\Admin\ListModules;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\AligmentOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\CheckboxSingleOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\ColorPickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\DropdownOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\FilePickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\FontPickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\HiddenOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\IconPickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\LinkPickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\MediaPickerOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\NumericOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\RadioModernOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\RadioOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\CheckboxOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\RangeSliderOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\SelectPageOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\SelectTagsOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\SimpleTextEditorOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\TextareaOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\TextOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\TextOptionNew;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\ToggleOption;
use PikseraPackages\Module\Http\Livewire\Admin\ModuleOption\ToggleReversedOption;
use PikseraPackages\Module\Repositories\ModuleRepository;


class ModuleServiceProvider extends ServiceProvider
{

    public function registerMenu()
    {
        AdminManager::getMenuInstance('left_menu_top')->addChild('Modules', [
            'uri' => route('admin.module.index'),
            'attributes'=>[
                'icon'=>' <svg fill="currentColor"class="me-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24"><path d="m390 976-68-120H190l-90-160 68-120-68-120 90-160h132l68-120h180l68 120h132l90 160-68 120 68 120-90 160H638l-68 120H390Zm248-440h86l44-80-44-80h-86l-45 80 45 80ZM438 656h84l45-80-45-80h-84l-45 80 45 80Zm0-240h84l46-81-45-79h-86l-45 79 46 81ZM237 536h85l45-80-45-80h-85l-45 80 45 80Zm0 240h85l45-80-45-80h-86l-44 80 45 80Zm200 120h86l45-79-46-81h-84l-46 81 45 79Zm201-120h85l45-80-45-80h-85l-45 80 45 80Z"/></svg>'
            ]
        ]);

        AdminManager::getMenuInstance('left_menu_top')
            ->menuItems
            ->getChild('Modules')
            ->setExtra('orderNumber', 4);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Event::listen(ServingAdmin::class, [$this, 'registerMenu']);

        View::addNamespace('module', __DIR__.'/resources/views');

        $this->app->singleton('module_admin_manager',function(){
            return new ModuleAdminManager();
        });
        $this->app->singleton('module_manager', function ($app) {
            return new ModuleManager();
        });

        $this->app->resolving(\PikseraPackages\Repository\RepositoryManager::class, function (\PikseraPackages\Repository\RepositoryManager $repositoryManager) {
            $repositoryManager->extend(\PikseraPackages\Module\Models\Module::class, function () {
                return new \PikseraPackages\Module\Repositories\ModuleRepository();
            });
        });


        /**
         * @property ModuleRepository $module_repository
         */
        $this->app->bind('module_repository', function () {
            return $this->app->repository_manager->driver(\PikseraPackages\Module\Models\Module::class);;
        });

        Livewire::component('piksera-option::text', TextOption::class);
        Livewire::component('piksera-option::hidden', HiddenOption::class);
        Livewire::component('piksera-option::numeric', NumericOption::class);
        Livewire::component('piksera-option::textarea', TextareaOption::class);
        Livewire::component('piksera-option::simple-text-editor', SimpleTextEditorOption::class);
        Livewire::component('piksera-option::file-picker', FilePickerOption::class);
        Livewire::component('piksera-option::font-picker', FontPickerOption::class);
        Livewire::component('piksera-option::media-picker', MediaPickerOption::class);
        Livewire::component('piksera-option::icon-picker', IconPickerOption::class);
        Livewire::component('piksera-option::link-picker', LinkPickerOption::class);
        Livewire::component('piksera-option::range-slider', RangeSliderOption::class);
        Livewire::component('piksera-option::dropdown', DropdownOption::class);
        Livewire::component('piksera-option::color-picker', ColorPickerOption::class);
        Livewire::component('piksera-option::radio', RadioOption::class);
        Livewire::component('piksera-option::toggle', ToggleOption::class);
        Livewire::component('piksera-option::toggle-reversed', ToggleReversedOption::class);
        Livewire::component('piksera-option::radio-modern', RadioModernOption::class);
        Livewire::component('piksera-option::checkbox', CheckboxOption::class);
        Livewire::component('piksera-option::checkbox-single', CheckboxSingleOption::class);

        Livewire::component('piksera-option::select-page', SelectPageOption::class);
        Livewire::component('piksera-option::select-tags', SelectTagsOption::class);

    }


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');

        Livewire::component('admin-modules-list', ListModules::class);
        Livewire::component('admin-ask-for-module-uninstall-modal', AskForModuleUninstallModal::class);

        $this->app->bind('module', function () {
            return new Module();
        });

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('ModuleManager', \PikseraPackages\Module\Facades\ModuleManager::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/admin.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
