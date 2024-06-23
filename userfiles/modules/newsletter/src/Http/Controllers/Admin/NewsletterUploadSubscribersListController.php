<?php
namespace PikseraPackages\Modules\Newsletter\Http\Controllers\Admin;


use Illuminate\Support\Facades\App;
use PikseraPackages\FileManager\Http\Controllers\PluploadController;
use PikseraPackages\Modules\Newsletter\ImportSubscribersFileReader;

class NewsletterUploadSubscribersListController extends PluploadController {

    public $allowedFileTypes = [
        'xlsx','xls','csv'
    ];
    public $returnPathResponse = false;

    public function getUploadPath()
    {
        return ImportSubscribersFileReader::getImportTempPath() . 'uploaded_files';
    }




}
