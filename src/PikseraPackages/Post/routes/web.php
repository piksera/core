<?php

Route::name('admin.')
    ->prefix(mw_admin_prefix_url())
    ->middleware(['admin'])
    ->namespace('\PikseraPackages\Post\Http\Controllers\Admin')
    ->group(function () {
        Route::resource('post', 'PostController',['except' => ['show']]);
    });
