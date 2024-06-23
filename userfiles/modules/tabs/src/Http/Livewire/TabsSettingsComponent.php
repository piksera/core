<?php
namespace PikseraPackages\Modules\Tabs\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TabsSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-tabs::livewire.settings');
    }
}
