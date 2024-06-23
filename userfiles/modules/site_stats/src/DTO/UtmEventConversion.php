<?php

namespace PikseraPackages\Modules\SiteStats\DTO;

class UtmEventConversion extends UtmEvent
{
    public $eventCategory = 'ecommerce';
    public $eventAction = 'CONVERSION';
    public $eventLabel = 'Conversion';

}
