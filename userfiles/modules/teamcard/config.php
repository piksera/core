<?php
$config = array();
$config['name'] = "Team Card";
$config['author'] = "Piksera";
$config['ui'] = true;
$config['version'] = "0.2";
$config['position'] = 57;
$config['categories'] = "miscellaneous";


$config['settings'] = [];
$config['settings']['translatable_options'] = [
    'settings'
];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Teamcard'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Teamcard\Providers\TeamcardServiceProvider::class
];
