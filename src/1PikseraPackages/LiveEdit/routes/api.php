<?php



\Route::name('api.live-edit.')
    ->prefix('api/live-edit')
    ->middleware(['api', 'admin', 'live_edit'])
    ->group(function () {

        Route::namespace('PikseraPackages\LiveEdit\Http\Controllers\Api')->group(function () {
            Route::get('get-top-right-menu', 'LiveEditMenusApi@getTopRightMenu')
                ->name('get-top-right-menu');
        });

    });
