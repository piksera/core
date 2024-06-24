<?php
namespace PikseraPackages\Import\Loggers;

use PikseraPackages\Backup\Loggers\DefaultLogger;

final class ImportLogger extends DefaultLogger
{
	public static $logName = 'Importing';
	public static $logFileName = 'import-session.log';

}
