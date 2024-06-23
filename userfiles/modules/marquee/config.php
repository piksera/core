<?php
$config = array();
$config['name'] = "Marquee";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "miscellaneous";
$config['position'] = 39;
$config['version'] = 1.0;

$config['settings'] = [];
$config['settings']['allowed_html_option_keys'] = [
    'text',
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Marquee'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Marquee\Providers\MarqueeServiceProvider::class
];
