<?php

namespace PikseraPackages\Modules\Admin\ImportExportTool\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use PikseraPackages\Export\Formats\Helpers\SpreadsheetHelper;
use PikseraPackages\Import\Formats\CsvReader;
use PikseraPackages\Import\Formats\XlsxReader;
use PikseraPackages\Modules\Admin\ImportExportTool\ImportMapping\Readers\XmlToArray;

class ExportFeed extends Model
{
    public $fillable = [
      'name',
      'is_draft',
      'split_to_parts',
      'export_format',
      'export_type',
    ];
    protected $casts = [
        'split_to_parts' => 'int',
    ];

}
