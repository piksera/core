<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ImportFeed;

class NoFeeds extends Component
{
    public function render()
    {
        return view('import_export_tool::admin.livewire-no-feeds');
    }
}
