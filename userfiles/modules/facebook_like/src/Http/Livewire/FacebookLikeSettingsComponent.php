<?php
namespace PikseraPackages\Modules\FacebookLike\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class FacebookLikeSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-facebook-like::livewire.settings');
    }
}
