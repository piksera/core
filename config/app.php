<?php return array (
  'name' => 'Laravel',
  'env' => 'production',
  'debug' => true,
  'url' => 'http://127.0.0.1:8000/',
  'asset_url' => NULL,
  'timezone' => 'UTC',
  'locale' => 'en_US',
  'fallback_locale' => 'en',
  'key' => 'base64:ZXlDN3F0aFNCd1RkZFhXMzRpQ29VMHJTUTNXN2lYSlA=',
  'cipher' => 'AES-256-CBC',
  'log' => 'daily',
  'providers' =>
  array (
    0 => 'PikseraPackages\\App\\Providers\\AppServiceProvider',
    1 => 'PikseraPackages\\App\\Providers\\EventServiceProvider',
    2 => 'PikseraPackages\\App\\Providers\\RouteServiceProvider',
  ),
  'manifest' => storage_path().DIRECTORY_SEPARATOR.'framework',
);
