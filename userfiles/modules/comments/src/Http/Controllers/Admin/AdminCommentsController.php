<?php

namespace PikseraPackages\Modules\Comments\Http\Controllers\Admin;

use PikseraPackages\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class AdminCommentsController extends AdminController
{
    public function index(Request $request)
    {
        return view('comments::admin.index');
    }
}
