<?php
namespace PikseraPackages\Modules\Content\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class ContentSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-content::livewire.settings');
    }
}
