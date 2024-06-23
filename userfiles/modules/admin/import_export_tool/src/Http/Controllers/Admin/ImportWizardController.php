<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ImportWizardController extends \PikseraPackages\Admin\Http\Controllers\AdminController
{
    public function index(Request $request)
    {
        return view('import_export_tool::admin.import-wizard-index');
    }
}
