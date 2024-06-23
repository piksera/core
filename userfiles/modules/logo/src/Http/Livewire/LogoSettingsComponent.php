<?php

namespace PikseraPackages\Modules\Logo\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class LogoSettingsComponent extends ModuleSettingsComponent
{

    public $showModal = false;
    public $showDialogModal = false;
    public $areYouSureModal = false;

    public function render()
    {
        return view('piksera-module-logo::livewire.settings');
    }

    public function showActionMessage()
    {
        $this->emit('showActionMessage', ['message' => 'This is a message from Example UI module']);
    }
}
