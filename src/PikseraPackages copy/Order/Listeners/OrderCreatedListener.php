<?php
namespace PikseraPackages\Order\Listeners;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use PikseraPackages\Option\Facades\Option;
use PikseraPackages\Order\Listeners\Tratis\NewOrderNotificationTrait;
use PikseraPackages\Order\Notifications\NewOrderNotification;
use PikseraPackages\User\Models\User;

class OrderCreatedListener
{
    use NewOrderNotificationTrait;

    public function handle($event)
    {
        $order = $event->getModel();

        $sendWhen = Option::getValue('order_email_send_when', 'orders');
        if ($sendWhen == 'order_received') {
            $this->sendNewOrderNotification($order);
        }

        // Admin panel notification
        Notification::send(User::whereIsAdmin(1)->get(), new NewOrderNotification($order));


        // delete old notifications for orders older than 30 days
        DB::table('notifications')
            ->where('type', NewOrderNotification::class)
            ->where('created_at', '<', date('Y-m-d H:i:s', strtotime('-30 days')))
            ->delete();


    }
}
