<?php
$config = array();
$config['name'] = "Accordion";
$config['author'] = "Piksera";
$config['ui'] = true;
$config['version'] = 0.01;
$config['categories'] = "miscellaneous";
$config['position'] = 52;

$config['settings'] = [];
$config['settings']['translatable_options'] = [
    'settings'
];


$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\\Modules\\Accordion'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\Accordion\Providers\AccordionServiceProvider::class
];



