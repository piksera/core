<?php
namespace PikseraPackages\Export\Loggers;

use PikseraPackages\Backup\Loggers\DefaultLogger;

class ExportLogger extends DefaultLogger
{
	public static $logName = 'Exporting';
	public static $logFileName = 'backup-export-session.log';

}
