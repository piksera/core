<?php

use PikseraPackages\Import\Formats\CsvReader;
use PikseraPackages\Modules\Admin\ImportExportTool\ImportFeedToDatabase;
use PikseraPackages\Modules\Admin\ImportExportTool\ImportMapping\FeedMapToArray;


Route::name('admin.import-export-tool.')
    ->prefix(mw_admin_prefix_url() . '/import-export-tool')
    ->middleware(['admin', \PikseraPackages\Modules\Admin\ImportExportTool\Http\Middleware\InstallationMiddleware::class])
    ->namespace('PikseraPackages\Modules\Admin\ImportExportTool\Http\Controllers\Admin')
    ->group(function () {

        Route::post('/upload-feed', 'UploadFeedController@upload')->name('upload-feed');

        Route::get('/import-wizard', 'ImportWizardController@index')->name('import-wizard');
        Route::get('/export-wizard', 'ExportWizardController@index')->name('export-wizard');

        Route::get('/export-wizard/file/{id}', 'ExportWizardController@file')->name('export-wizard-file');
        Route::get('/delete-wizard/file/{id}', 'ExportWizardController@deleteFile')->name('delete-wizard-file');

        Route::get('/', 'AdminController@index')->name('index.main');
        Route::get('/install', 'InstallController@index')->name('install');
        Route::get('/index', 'AdminController@index')->name('index');
        Route::get('/import/{id}', 'AdminController@import')->name('import');
        Route::get('/import-start/{id}', 'AdminController@importStart')->name('import-start');
        Route::get('/import-delete/{id}', 'AdminController@importDelete')->name('import-delete');


        Route::get('/index-exports', 'AdminController@exports')->name('index-exports');

    });
