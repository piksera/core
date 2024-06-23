<?php

if (version_compare(phpversion(), '7.3.0', '<=')) {
    exit('Error: You must have PHP version 7.3.0 or greater to run Piksera');
}
if (!defined('T')) {
    $mtime = microtime();
    $mtime = explode(' ', $mtime);
    $mtime = $mtime[1] + $mtime[0];
    define('T', $mtime);
}

if (!defined('PS_V')) {
    //remember to change also in version.txt
    define('PS_V', \PikseraPackages\App\LaravelApplication::APP_VERSION);
}


if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('PS_PATH')) {
    define('PS_PATH', realpath(__DIR__.'/../').DS);
}

if (!defined('PS_ROOTPATH')) {
    define('PS_ROOTPATH', base_path().DS);
}

if (!defined('PS_USERFILES_FOLDER_NAME')) {
//    if (defined('PS_BOOT_FROM_PUBLIC_FOLDER')) {
//        define('PS_USERFILES_FOLDER_NAME', ''); //relative to public dir
//    } else {
//
//    }

    define('PS_USERFILES_FOLDER_NAME', 'userfiles'); //relative to public dir

}
if (!defined('PS_MODULES_FOLDER_NAME')) {
    define('PS_MODULES_FOLDER_NAME', 'modules'); //relative to userfiles dir
}
if (!defined('PS_ELEMENTS_FOLDER_NAME')) {
    define('PS_ELEMENTS_FOLDER_NAME', 'elements'); //relative to userfiles dir
}
if (!defined('PS_MEDIA_FOLDER_NAME')) {
    define('PS_MEDIA_FOLDER_NAME', 'media'); //relative to userfiles dir
}

if (!defined('PS_TEMPLATES_FOLDER_NAME')) {
    define('PS_TEMPLATES_FOLDER_NAME', 'templates'); //relative to userfiles dir
}
if (!defined('PS_SYSTEM_MODULE_FOLDER')) {
    define('PS_SYSTEM_MODULE_FOLDER', 'piksera'); //relative to modules dir
}


$functions_dir = __DIR__.DS;

include_once $functions_dir.'paths.php';
include_once $functions_dir.'events.php';

include_once $functions_dir.'url.php';
include_once $functions_dir.'api.php';
include_once $functions_dir.'api_callbacks.php';
include_once $functions_dir.'lang.php';
include_once $functions_dir.'common.php';
include_once $functions_dir.'filesystem.php';
include_once $functions_dir.'array.php';
include_once $functions_dir.'string.php';
include_once $functions_dir.'other.php';
include_once $functions_dir.'mail.php';

