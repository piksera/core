<?php
namespace PikseraPackages\Modules\Categories\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class CategorySettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-category::livewire.settings');
    }
}
