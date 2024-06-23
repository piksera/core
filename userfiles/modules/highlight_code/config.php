<?php
$config = array();
$config['name'] = "Highlight Code";
$config['author'] = "Piksera";
$config['ui'] = true;
$config['categories'] = "other";
$config['position'] = 700;
$config['version'] = "1.3";

$config['settings'] = [];
$config['settings']['allowed_html_option_keys'] = [
    'text',
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\HighlightCode'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\HighlightCode\Providers\HighlightCodeServiceProvider::class
];
