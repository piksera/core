<?php

namespace PikseraPackages\User\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PikseraPackages\Option\Facades\Option;
use PikseraPackages\User\Events\UserWasRegistered;
use PikseraPackages\User\Http\Requests\RegisterRequest;
use PikseraPackages\User\Models\User;

class UserRegisterController extends Controller
{
    public $middleware = [
        [
            'middleware' => 'xss',
            'options' => []
        ]
    ];

    public $fillable = [
        'username',
        'password',
        'email',
        'basic_mode',
        'first_name',
        'last_name',
        'thumbnail',
        'parent_id',
        'user_information',
      //  'subscr_id',
        'profile_url',
        'website_url',
        'phone'
    ];

    /**
     * register api
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */


     public function registerForm()
     {
         $parsed = view('user::admin.users.register');

         return app()->parser->process($parsed);
     }

     public function register(RegisterRequest $request)
     {
         $userData = [];
         $inputs = $request->all();

         $enable_user_registration = get_option('enable_user_registration', 'users');
         if ($enable_user_registration === 'n' || $enable_user_registration === 0) {
             $resp = [
                 'error' => true,
                 'message' => 'User registration is disabled.',
             ];
             return $resp;
         }

         if ($inputs) {
             foreach ($inputs as $input_key => $input) {
                 if (in_array($input_key, $this->fillable)) {
                     $userData[$input_key] = $input;
                 }
             }
         }

         if (!isset($userData['username'])) {
             $userData['username'] = explode('@', $userData['email'])[0];
         }

         $registration_approval_required = Option::getValue('registration_approval_required', 'users');
         $isVerfiedEmailRequired = Option::getValue('register_email_verify', 'users');

         if ($registration_approval_required == true) {
             $userData['is_active'] = 0;
         } else {
             $userData['is_active'] = 1;
         }

         if ($isVerfiedEmailRequired == true) {
             $userData['is_verified'] = 0;
         } else {
             $userData['is_verified'] = 1;
         }

         $should_login = true;
         if ($registration_approval_required || $isVerfiedEmailRequired) {
             $should_login = false;
         }

         if (isset($inputs['login']) and !$inputs['login']) {
             $should_login = false;
         }

         $created = User::create($userData);
         if ($created) {
             Session::flash('old_sid', Session::getId());
             event(new Registered($created));

             if ($should_login) {
                 app()->user_manager->make_logged($created->id);
             }
         }

         // Redirect to a specific route or URL after registration
         return redirect()->route('home'); // Adjust this to your desired route
     }



}
