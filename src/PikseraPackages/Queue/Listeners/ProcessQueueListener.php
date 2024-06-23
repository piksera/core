<?php

namespace PikseraPackages\Queue\Listeners;



class ProcessQueueListener
{
    public function handle($event)
    {
        $controller = app()->make('PikseraPackages\Queue\Http\Controllers\ProcessQueueController');
        $controller->handle();
    }
}
