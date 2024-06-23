<?php

namespace PikseraPackages\Template\tests;


use PikseraPackages\Template\Http\Livewire\Admin\AdminTemplateUpdateModal;
use PikseraPackages\User\tests\UserLivewireComponentsAccessTest;

class TemplateLivewireComponentsAccessTest extends UserLivewireComponentsAccessTest
{
    public $componentsList = [
        AdminTemplateUpdateModal::class,
    ];
}
