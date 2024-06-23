<?php

$config = array();
$config['name'] = "Schema.org";
$config['author'] = "Bozhidar Slaveykov";
$config['description'] = "Piksera";
$config['website'] = "http://piksera.com/";
$config['version'] = 1;
$config['ui'] = false;
$config['ui_admin'] = false;
$config['position'] = 100;
$config['categories'] = "miscellaneous";

$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\SchemaOrg'
    ],
];
