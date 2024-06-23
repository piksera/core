<?php

namespace PikseraPackages\Template;

use PikseraPackages\Backup\Loggers\BackupLogger;
use PikseraPackages\Import\Import;

class TemplateInstaller extends Import
{
    public $batchImporting = true;
    public $ovewriteById = true;
    public $deleteOldContent = false;

    public function __construct() {
        $this->logger = new BackupLogger();
    }
}
