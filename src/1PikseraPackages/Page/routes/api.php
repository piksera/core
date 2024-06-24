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
    ->namespace('\PikseraPackages\Page\Http\Controllers\Api')
    ->group(function () {

        Route::apiResource('page', 'PageApiController');

    });
