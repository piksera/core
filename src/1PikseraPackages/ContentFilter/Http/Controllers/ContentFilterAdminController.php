<?php

namespace PikseraPackages\ContentFilter\Http\Controllers;


use Illuminate\Http\Request;
use PikseraPackages\Admin\Http\Controllers\AdminController;
use PikseraPackages\Admin\Http\Controllers\AdminDefaultController;

class ContentFilterAdminController extends AdminController
{

    public function index(Request $request)
    {
        return view('content_filter::admin');

    }

    public function show()
    {

    }
}
