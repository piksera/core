<?php

Route::name('google-analytics.')
    ->prefix('/google-analytics')
    ->middleware(['web'])
    ->namespace('PikseraPackages\Modules\GoogleAnalytics\Http\Controllers')
    ->group(function () {


    });
