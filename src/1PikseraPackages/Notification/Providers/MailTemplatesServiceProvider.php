<?php

namespace PikseraPackages\Notification\Providers;

use Illuminate\Support\ServiceProvider;
use PikseraPackages\Notification\Mail\MailTemplates;

class MailTemplatesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('mail_templates', function ($app) {
            return new MailTemplates();
        });
    }
}
