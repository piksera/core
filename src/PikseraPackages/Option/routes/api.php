<?php
Route::name('api.')
    ->prefix('api')
    ->middleware(['admin'])
    ->namespace('\PikseraPackages\Option\Http\Controllers\Api')
    ->group(function () {

        \Route::post('save_option', 'SaveOptionApiController@saveOption')->name('option.save');

    });
