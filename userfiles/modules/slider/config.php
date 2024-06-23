<?php
$config = array();

$config['name'] = "Slider (Deprecated)";
$config['author'] = "Piksera";
$config['version'] = "0.2";
$config['categories'] = "media";
$config['no_cache'] = false;
$config['ui'] = false;
$config['ui_admin'] = false;
$config['position'] = 18;

$config['settings'] = [];
$config['settings']['translatable_options'] = [
    'settings'
];

$config['settings']['allowed_html_option_keys'] = [
    'settings'
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\Slider'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Slider\Providers\SliderServiceProvider::class
];
