<?php


namespace PikseraPackages\User\Notifications;

use Illuminate\Auth\Events\Registered;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use PikseraPackages\Option\Facades\Option;

class SendEmailVerificationNotificationOnRegister extends SendEmailVerificationNotification
{
    public function handle(Registered $event)
    {
        $isVerfiedEmailRequired = Option::getValue('register_email_verify', 'users');

        if ($isVerfiedEmailRequired) {
            parent::handle($event);
        }
    }
}