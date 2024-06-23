<?php
namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ExportFeed;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ImportFeed;

class InstallController extends \PikseraPackages\Admin\Http\Controllers\AdminController
{
    public function index(Request $request)
    {
        return view('import_export_tool::admin.install');
    }
}
