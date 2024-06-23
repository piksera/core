<?php
namespace PikseraPackages\Modules\ContactForm\Http\Controllers\Admin;

use Illuminate\Http\Request;;

class AdminController extends \PikseraPackages\App\Http\Controllers\AdminController
{
    public function index(Request $request)
    {
        return view('contact-form::admin.contact-form.index');
    }
}
