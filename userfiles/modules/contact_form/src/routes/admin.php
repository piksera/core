<?php

Route::name('admin.contact-form.')
    ->prefix(ADMIN_PREFIX . '/contact-form')
    ->middleware(['admin'])
    ->namespace('PikseraPackages\Modules\ContactForm\Http\Controllers\Admin')
    ->group(function () {

        Route::get('/', 'AdminController@index')->name('index');

    });
