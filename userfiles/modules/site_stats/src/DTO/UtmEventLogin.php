<?php

namespace PikseraPackages\Modules\SiteStats\DTO;

class UtmEventLogin extends UtmEvent
{
    public $eventCategory = 'user';
    public $eventAction = 'LOGIN';
    public $eventLabel = 'User Login';



}
