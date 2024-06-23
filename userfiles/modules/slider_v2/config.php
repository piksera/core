<?php
$config = array();

$config['name'] = "Slider";
$config['author'] = "Piksera";
$config['version'] = "0.2";
$config['categories'] = "media";
$config['no_cache'] = false;
$config['ui'] = true;
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
        'namespace' => 'PikseraPackages\Modules\SliderV2'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\SliderV2\Providers\SliderServiceProvider::class
];
