<?php
/**
* Created by PhpStorm.
 * User: Bojidar
* Date: 10/7/2020
* Time: 5:50 PM
*/

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('api/users/export_my_data', function (\Illuminate\Http\Request $request) {

    if (!is_logged()) {
        return array('error' => 'You must be logged');
    }

    $userId = (int) $request->all()['user_id'];

    $allowToExport = false;
    if ($userId == user_id()) {
        $allowToExport = true;
    } else if (is_admin()) {
        $allowToExport = true;
    }

    if ($allowToExport == false) {
        return array('error' => 'You are now allowed to export this information.');
    }

    $exportFromTables = [];
    $prefix = mw()->database_manager->get_prefix();
    $tablesList = mw()->database_manager->get_tables_list(true);
    foreach ($tablesList as $table) {
        $table = str_replace($prefix, false, $table);
        $columns  = Schema::getColumnListing($table);
        if (in_array('created_by', $columns)) {
            $exportFromTables[] = $table;
        }
    }

    $exportData = [];
    foreach ($exportFromTables as $exportFromTable) {
        $getData = \Illuminate\Support\Facades\DB::table($exportFromTable)->where('created_by', $userId)->get();
        if (!empty($getData)) {
            $exportData[$exportFromTable] = $getData->toArray();
        }
    }

    $json = new \PikseraPackages\Export\Formats\JsonExport($exportData);
    $getJson = $json->start();

    if (isset($getJson['files'][0]['filepath'])) {
        return response()->download($getJson['files'][0]['filepath'])->deleteFileAfterSend(true);
    }

})->name('api.users.export_my_data');

// Admin web
Route::prefix(mw_admin_prefix_url())->middleware(['admin'])->namespace('\PikseraPackages\User\Http\Controllers')->group(function () {
    Route::get('login', 'UserLoginController@index')->name('admin.login')->middleware(['allowed_ips']);
});



// OLD API SAVE USER
Route::post('api/save_user', function (Request $request) {
    if (!defined('PS_API_CALL')) {
        define('PS_API_CALL', true);
    }
    if(!is_logged()){
        App::abort(403, 'Unauthorized action.');
    }

    $input = Input::all();

    return save_user($input);
})->middleware(['api'])->name('api.save_user');

Route::post('api/delete_user', function (Request $request) {
    if (!defined('PS_API_CALL')) {
        define('PS_API_CALL', true);
    }
    if(!is_admin()){
        App::abort(403, 'Unauthorized action.');
    }
    $input = Input::all();
    return delete_user($input);
})->middleware(['api']);


Route::name('api.')
    ->prefix('api')
    ->middleware([
        'api.public',
        //  \PikseraPackages\App\Http\Middleware\VerifyCsrfToken::class,
        \PikseraPackages\App\Http\Middleware\XSS::class
    ])
    ->namespace('\PikseraPackages\User\Http\Controllers')
    ->group(function () {

        Route::post('user_login', function () {
            return user_login(request()->all());
        })->name('user_login')->middleware(['allowed_ips','throttle:60,1']);

    });

Route::name('api.user.')
    ->prefix('api/user')
    ->middleware([
        'api.public',
      //  \PikseraPackages\App\Http\Middleware\VerifyCsrfToken::class,
        \PikseraPackages\App\Http\Middleware\XSS::class
    ])
    ->namespace('\PikseraPackages\User\Http\Controllers')
    ->group(function () {

    Route::post('login', 'UserLoginController@login')->name('login')->middleware(['allowed_ips','throttle:60,1']);
    Route::any('logout', 'UserLoginController@logout')->name('logout')->excludedMiddleware(
        \PikseraPackages\App\Http\Middleware\XSS::class
    );
    Route::post('register', 'UserRegisterController@register')->name('register')->middleware(['allowed_ips']);

    Route::post('/forgot-password', 'UserForgotPasswordController@send')
        ->middleware(['throttle:120,10'])
        ->name('password.email');
    Route::post('/reset-password', 'UserForgotPasswordController@update')->name('password.update');

    Route::post('/profile-update', 'UserProfileController@update')->name('profile.update');

});

Route::name('api.')
    ->prefix('api')
    ->middleware([
        'api',
      //  \PikseraPackages\App\Http\Middleware\VerifyCsrfToken::class,
        \PikseraPackages\App\Http\Middleware\XSS::class
    ])
    ->namespace('\PikseraPackages\User\Http\Controllers\Api')
    ->group(function () {

        Route::get('/logout', '\PikseraPackages\User\Http\Controllers\UserLogoutController@index')->name('api.logout')
            ->middleware([
                \PikseraPackages\App\Http\Middleware\VerifyCsrfToken::class,
                \PikseraPackages\App\Http\Middleware\SameSiteRefererMiddleware::class
            ])
            ->excludedMiddleware(
           'api'
        );;

        Route::apiResource('user', 'UserApiController')->middleware(['admin','xss']);
    });
