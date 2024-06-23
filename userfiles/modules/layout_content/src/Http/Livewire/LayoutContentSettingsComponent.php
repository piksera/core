<?php
namespace PikseraPackages\Modules\LayoutContent\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class LayoutContentSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-layout-content::livewire.settings');
    }
}
