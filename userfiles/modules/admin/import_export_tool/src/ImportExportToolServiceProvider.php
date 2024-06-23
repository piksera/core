<?php
/*
 * This file is part of the Piksera framework.
 *
 * (c) Piksera CMS LTD
 *
 * For full license information see
 * https://github.com/piksera/piksera/blob/master/LICENSE
 *
 */

namespace PikseraPackages\Modules\Admin\ImportExportTool;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Install\PikseraMigrator;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\DropdownMapping;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ExportWizard;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\FeedReport;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\DropdownMappingPreview;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ImportWizard;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\Install;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\NewImportModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\NoExportFeeds;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\NoFeeds;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\StartExportingModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\StartImportingModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ViewImport;

class ImportExportToolServiceProvider extends ServiceProvider
{
    /**
     * Whether or not to defer the loading of this service
     * provider until it's needed
     *
     * @var boolean
     */
//    protected $defer = true;


    public function provides()
    {
        return ['PikseraPackages\Modules\Admin\ImportExportTool'];
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */


    public function boot()
    {
        $this->loadViewsFrom( __DIR__. '/resources/views/components', 'import_export_tool');

        Livewire::component('import_export_tool::install', Install::class);
        Livewire::component('import_export_tool::import_wizard', ImportWizard::class);
        Livewire::component('import_export_tool::export_wizard', ExportWizard::class);
        Livewire::component('import_export_tool::no_feeds', NoFeeds::class);
        Livewire::component('import_export_tool::no_export_feeds', NoExportFeeds::class);
        Livewire::component('import_export_tool::feed_report', FeedReport::class);
        Livewire::component('import_export_tool::new_import_modal', NewImportModal::class);
        Livewire::component('import_export_tool::start_importing_modal', StartImportingModal::class);
        Livewire::component('import_export_tool::start_exporting_modal', StartExportingModal::class);
        Livewire::component('import_export_tool::view_import', ViewImport::class);
        Livewire::component('import_export_tool::dropdown_mapping_preview', DropdownMappingPreview::class);
        Livewire::component('import-export-tool::dropdown_mapping', DropdownMapping::class);
    }

    public function register()
    {
        $this->app->singleton('import_export_migrator', function ($app) {
            $repository = $app['migration.repository'];
            return new ModuleMigrator($repository, $app['db'], $app['files'], $app['events']);
        });

        $this->loadRoutesFrom((__DIR__) . '/routes/admin.php');
        $this->loadMigrationsFrom(__DIR__ . '/migrations/');

        View::addNamespace('import_export_tool', normalize_path((__DIR__) . '/resources/views'));
    }
}
