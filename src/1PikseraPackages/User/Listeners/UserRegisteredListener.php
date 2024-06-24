<?php

namespace PikseraPackages\User\Listeners;

use Illuminate\Support\Facades\Notification;

use PikseraPackages\Option\Facades\Option;
use PikseraPackages\User\Models\User;
use PikseraPackages\User\Notifications\NewRegistration;
use PikseraPackages\User\Notifications\NewRegistrationAdminNotification;

class UserRegisteredListener
{
    public function handle($event)
    {

        try {
            $newRegEvent = new NewRegistration($event->user);
            $isRegisterEmailEnabled = Option::getValue('register_email_enabled', 'users');
            if ($isRegisterEmailEnabled) {
                $event->user->notifyNow($newRegEvent);
            }
        } catch (\Exception $e) {

        }

        try {
            $adminUser = User::whereIsAdmin(1)->get();
            $newRegEvent = new NewRegistrationAdminNotification($event->user);
            $registerEmailToAdminsEnabled = Option::getValue('register_email_to_admins_enabled', 'users');
            if ($registerEmailToAdminsEnabled) {
                Notification::send($adminUser, $newRegEvent);
            }
        } catch (\Exception $e) {

        }

    }
}
