<?php

namespace PikseraPackages\Modules\Toc\Http\Livewire;

use PikseraPackages\LiveEdit\Http\Livewire\ModuleSettingsComponent;

class TocSettingsComponent extends ModuleSettingsComponent
{

    public $showModal = false;
    public $showDialogModal = false;
    public $areYouSureModal = false;

    public function render()
    {
        return view('piksera-module-toc::livewire.settings');
    }

    public function showActionMessage()
    {
        $this->emit('showActionMessage', ['message' => 'This is a message from Example UI module']);
    }
}
