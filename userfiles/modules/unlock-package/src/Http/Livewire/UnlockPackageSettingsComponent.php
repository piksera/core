<?php
namespace PikseraPackages\Modules\UnlockPackage\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class UnlockPackageSettingsComponent extends ModuleSettingsComponent
{
    public function render()
    {
       return view('piksera-module-unlock-package::livewire.settings');
    }
}
