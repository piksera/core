<?php
namespace PikseraPackages\Modules\CustomFields\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class CustomFieldsSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-custom-fields::livewire.settings');
    }
}
