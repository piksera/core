<?php
$config = array();
$config['name'] = "FAQ";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['ui_admin'] = false;
$config['is_system'] = false;
$config['version'] = 0.01;
$config['position'] = 57;
$config['categories'] = "miscellaneous";

$config['settings'] = [];
$config['settings']['translatable_options'] = [
    'settings'
];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Faq'
    ],
];

$config['settings']['service_provider'] = [
   \PikseraPackages\Modules\Faq\Providers\FaqServiceProvider::class
];

