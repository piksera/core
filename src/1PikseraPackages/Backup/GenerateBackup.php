<?php

namespace PikseraPackages\Backup;

use PikseraPackages\Backup\Loggers\BackupLogger;
use PikseraPackages\Export\Export;
use PikseraPackages\Export\SessionStepper;

class GenerateBackup extends Export
{
    public $type = 'json';
    public $allowSkipTables = true; // this will skip sensitive tables

    public function __construct() {
        $this->logger = new BackupLogger();
    }

}
