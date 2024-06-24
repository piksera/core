<?php
namespace PikseraPackages\Backup\Loggers;

final class RestoreLogger extends DefaultLogger
{
	public static $logName = 'Restore';
	public static $logFileName = 'backup-restore-session.log';

}
