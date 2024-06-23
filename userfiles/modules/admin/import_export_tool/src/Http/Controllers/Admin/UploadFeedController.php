<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Http\Controllers\Admin;

use PikseraPackages\FileManager\Http\Controllers\PluploadController;
use PikseraPackages\Modules\Admin\ImportExportTool\Models\ImportFeed;

class UploadFeedController extends PluploadController
{
    public $allowedFileTypes = [
        'xml','xlsx','xls','csv'
    ];
    public $returnPathResponse = false;

    public function getUploadPath()
    {
        return ImportFeed::getImportTempPath() . 'uploaded_files';
    }

}
