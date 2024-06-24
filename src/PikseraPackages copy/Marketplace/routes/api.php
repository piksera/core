<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/

Route::name('api.')
    ->prefix('api')
    ->middleware(['api','admin'])
    ->namespace('\PikseraPackages\Marketplace\Http\Controllers\Api')
    ->group(function () {



    });
