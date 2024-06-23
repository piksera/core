<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 2/4/2021
 * Time: 3:42 PM
 */


namespace PikseraPackages\Order\Listeners\Tratis;

use Illuminate\Support\Facades\Notification;
use PikseraPackages\Order\Models\OrderAnonymousClient;
use PikseraPackages\Order\Notifications\NewOrderNotification;
use PikseraPackages\User\Models\User;

trait NewOrderNotificationTrait {

    public function sendNewOrderNotification($order) {

        $orderId = $order->id;

        $newOrderEvent = new NewOrderNotification($order);

        // Is logged
        $notifiable = false;
        if (isset($order->created_by) && $order->created_by > 0) {
            $customer = User::where('id', $order->created_by)->first();
            if ($customer) {
                if (empty($order->email)) {
                    $notifiable = $customer;
                }
            }
        }

        if (!$notifiable) {
            $notifiable = OrderAnonymousClient::find($orderId);

        }

        if ($notifiable) {
            $notifiable->notifyNow($newOrderEvent);
        }

    }
}
