<?php

namespace PikseraPackages\Modules\ContactForm\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class IntegrationsModalComponent extends ModalComponent
{
    public function render()
    {
        return view('contact-form::admin.contact-form.modals.integrations-modal');
    }
}
