<?php

Route::name('api.')
    ->prefix('api')
    ->middleware(['api','admin'])
    ->namespace('\PikseraPackages\Order\Http\Controllers\Api')
    ->group(function () {
        Route::apiResource('order', 'OrderApiController');
    });