<?php

$config = array();
$config['name'] = "Tweet Embed";
$config['author'] = "Piksera";
$config['no_cache'] = false;
$config['ui'] = true;
$config['categories'] = "social";
$config['position'] = 200;
$config['version'] = 1.1;


$config['settings'] = [];
$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'PikseraPackages\Modules\TweetEmbed'
    ],
];

$config['settings']['service_provider'] = [
    \PikseraPackages\Modules\TweetEmbed\Providers\TweetEmbedServiceProvider::class
];

