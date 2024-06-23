<?php
$config = array();
$config['name'] = "Mail Templates";
$config['author'] = "Piksera";
//$config['ui'] = false;
$config['position'] = 100;
//$config['type'] = "mail_templates";



$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\MailTemplates'
    ],
];
$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\MailTemplates\MailTemplatesServiceProvider::class
];
