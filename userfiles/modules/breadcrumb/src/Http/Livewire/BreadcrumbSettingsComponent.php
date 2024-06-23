<?php
namespace PikseraPackages\Modules\Breadcrumb\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class BreadcrumbSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-breadcrumb::livewire.settings');
    }
}
