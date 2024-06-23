<?php

$config = array();
$config['name'] = "Templates Settings";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = 0;
$config['ui_admin'] = 0;
$config['is_system'] = 1;
$config['position'] = 0;
$config['version'] = "0.1";
$config['categories'] = "essentials";

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Admin\Modules\TemplatesSettings'
    ],
];

$config['settings']['service_provider'] = [
   \PikseraPackages\Modules\Admin\Modules\TemplatesSettings\Providers\TemplatesSettingsServiceProvider::class
];

