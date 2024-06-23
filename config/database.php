<?php return array (
  'fetch' => 8,
  'default' => 'mysql',
  'connections' => 
  array (
    'sqlite' => 
    array (
      'driver' => 'sqlite',
      'database' => storage_path().DIRECTORY_SEPARATOR.'database.sqlite',
      'prefix' => '',
    ),
    'mysql' => 
    array (
      'driver' => 'mysql',
      'url' => NULL,
      'host' => '127.0.0.1',
      'database' => 'bloggy',
      'username' => 'user',
      'password' => 'password',
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix' => '',
      'prefix_indexes' => true,
      'strict' => false,
    ),
    'pgsql' => 
    array (
      'driver' => 'pgsql',
      'url' => NULL,
      'host' => '127.0.0.1',
      'port' => '5432',
      'database' => 'laravel',
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
      'prefix' => '',
      'prefix_indexes' => true,
      'search_path' => 'public',
      'sslmode' => 'prefer',
    ),
    'sqlsrv' => 
    array (
      'driver' => 'sqlsrv',
      'host' => 'localhost',
      'database' => 'database',
      'username' => 'root',
      'password' => '',
      'prefix' => '',
    ),
  ),
  'migrations' => 'migrations',
  'redis' => 
  array (
    'cluster' => false,
    'default' => 
    array (
      'host' => '127.0.0.1',
      'port' => 6379,
      'database' => 0,
    ),
  ),
);