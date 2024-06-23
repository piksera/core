<?php
$config = array();
$config['name'] = "Import Export Tool";
$config['author'] = "Piksera";

$config['categories'] = "admin";
$config['version'] = 0.3;
$config['ui_admin'] = true;
$config['ui'] = false;
$config['position'] = 99;

$config['settings'] = [];
$config['settings']['routes'] = [
    'admin'=>'admin.import-export-tool.index'
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Admin\\ImportExportTool\\'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Admin\ImportExportTool\ImportExportToolServiceProvider::class
];
