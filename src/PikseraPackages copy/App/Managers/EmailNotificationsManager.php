<?php

namespace PikseraPackages\App\Managers;

class EmailNotificationsManager
{
    /** @var \PikseraPackages\App\LaravelApplication */
    public $app;

    public function __construct($app = null)
    {
        if (is_object($app)) {
            $this->app = $app;
        } else {
            $this->app = mw();
        }
    }
}
