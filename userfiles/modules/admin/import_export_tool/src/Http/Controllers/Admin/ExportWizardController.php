<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PikseraPackages\Category\Models\Category;
use PikseraPackages\Export\Formats\CsvExport;
use PikseraPackages\Export\Formats\XlsxExport;
use PikseraPackages\Export\Formats\XmlExport;
use PikseraPackages\Modules\Admin\ImportExportTool\BuildCategoryTree;
use PikseraPackages\Modules\Admin\ImportExportTool\BuildProductCategoryTree;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ExportFeed;
use PikseraPackages\Multilanguage\MultilanguageHelpers;
use PikseraPackages\Page\Models\Page;
use PikseraPackages\Post\Models\Post;
use PikseraPackages\Product\Models\Product;

class ExportWizardController extends \PikseraPackages\Admin\Http\Controllers\AdminController
{
    public function index(Request $request)
    {
       return view('import_export_tool::admin.export-wizard-index');
    }

    public function deleteFile($id)
    {
        $findExportFeed = ExportFeed::where('id', $id)->first();
        if ($findExportFeed) {
            $findExportFeed->delete();
        }

        return redirect(route('admin.import-export-tool.index-exports'));
    }

    public function file($id)
    {


    }

}
