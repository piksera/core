<?php
$config = array();
$config['name'] = "Video";
$config['author'] = "Piksera";
$config['categories'] = "media";
$config['position'] = 6;
$config['version'] = "1.2";

$config['no_cache'] = false;
$config['ui'] = true;


$config['settings'] = [];
$config['settings']['allowed_html_option_keys'] = [
    'embed_url',
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Video'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Video\Providers\VideoServiceProvider::class
];


