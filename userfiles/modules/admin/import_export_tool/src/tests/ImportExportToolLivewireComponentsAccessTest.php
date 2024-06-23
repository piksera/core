<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\tests;


use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\DropdownMapping;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\DropdownMappingPreview;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ExportWizard;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\FeedReport;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ImportWizard;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\Install;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\NewImportModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\NoExportFeeds;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\StartExportingModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\StartImportingModal;
use PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin\ViewImport;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;
/**
 * @runTestsInSeparateProcesses
 */
class ImportExportToolLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        DropdownMapping::class,
        DropdownMappingPreview::class,
        ExportWizard::class,
        FeedReport::class,
        ImportWizard::class,
        Install::class,
        NewImportModal::class,
        NoExportFeeds::class,
        StartExportingModal::class,
        StartImportingModal::class,
        ViewImport::class,
    ];
}

