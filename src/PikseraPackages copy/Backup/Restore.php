<?php

namespace PikseraPackages\Backup;

use PikseraPackages\Backup\Loggers\BackupLogger;
use PikseraPackages\Import\Import;

class Restore extends Import
{
    public $batchImporting = true;
    public $ovewriteById = true;
    public $deleteOldContent = true;

    public function __construct() {
        $this->logger = new BackupLogger();
    }
}
