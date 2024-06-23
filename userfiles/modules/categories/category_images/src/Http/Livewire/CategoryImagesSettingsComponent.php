<?php
namespace PikseraPackages\Modules\Categories\CategoryImages\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class CategoryImagesSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-category-images::livewire.settings');
    }
}
