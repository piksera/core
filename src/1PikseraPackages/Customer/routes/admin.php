<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
*/


Route::prefix(mw_admin_prefix_url())->name('admin.')
    ->namespace('\PikseraPackages\Customer\Http\Controllers\Admin')
    ->middleware(['admin','api','xss'])->group(function () {

    Route::post('/customers/delete', [
        'as' => 'customers.delete',
        'uses' => 'CustomersController@delete'
    ]);

    Route::resource('customers', 'CustomersController');

});
