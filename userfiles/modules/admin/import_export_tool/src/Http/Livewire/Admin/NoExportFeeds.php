<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use PikseraPackages\Admin\Http\Livewire\AdminComponent;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ImportFeed;

class NoExportFeeds extends AdminComponent
{
    public function render()
    {
        return view('import_export_tool::admin.livewire-no-export-feeds');
    }
}
