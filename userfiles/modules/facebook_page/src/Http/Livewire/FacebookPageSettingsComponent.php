<?php
namespace PikseraPackages\Modules\FacebookPage\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class FacebookPageSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-facebook-page::livewire.settings');
    }
}
