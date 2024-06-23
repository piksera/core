<?php
namespace PikseraPackages\Modules\SiteStats\DTO;

class UtmEvent {

    public $eventCategory;
    public $eventAction;
    public $eventLabel;
    public $eventValue;
    public $eventData = null;

    public function setInternalData($data)
    {
        $this->eventData = $data;
    }

}
