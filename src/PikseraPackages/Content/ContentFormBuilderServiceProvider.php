<?php

namespace PikseraPackages\Content;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PikseraPackages\Content\Http\Livewire\Admin\ContentFormBuilder;


class ContentFormBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {


        Livewire::component('admin-content-form-builder', ContentFormBuilder::class);

    }

}
