<?php


\Route::name('shop.shipping.')
    ->prefix('api/shop/shipping')
    ->middleware(['xss'])
    ->namespace('\PikseraPackages\Shipping\Http\Controllers')
    ->group(function () {
        \Route::match(array('GET', 'POST'), 'set_provider', '\PikseraPackages\Shipping\Http\Controllers\Api@setShippingProviderToSession')->name('set_provider');
    });




