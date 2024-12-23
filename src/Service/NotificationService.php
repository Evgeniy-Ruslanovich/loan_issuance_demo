<?php

namespace App\Service;

use App\Contracts\CustomerInterface;
use App\Entity\Order;

class NotificationService
{
    private const string EMAIL_TEXT_SUCCESS = 'To: %s || Dear %s! You have received the following loan: Bank: %s, Product: %s, Rate: %s. Thank you for using our services';
    private const string EMAIL_TEXT_DECLINE = 'To: %s || Dear %s! Unfortunately, you loan order was declined by reason: %s';
    public function notify(CustomerInterface $customer, Order $order): void
    {
        // TODO here get customer notify setting
        // e.g. if(customer->getSettings()->isSmsEnabled()) {
        //    $this->enqueueSms()
        // }
        // if(customer->getSettings()->isEmailEnabled()) {
        //    $this->enqueueEmail()
        // }
        $this->sendFakeEmail($customer, $order);
    }

    private function sendFakeEmail(CustomerInterface $customer, Order $order): void
    {
        $details = $order->getDetails();
        if ($order->getStatus() === Order::STATUS_ISSUED) {
            $text = sprintf(
                self::EMAIL_TEXT_SUCCESS,
                $customer->getEmail(),
                $customer->getFirstName(),
                $details['bankName'] ?? '',
                $details['name'] ?? '',
                $details['rate'] ?? '',
            );
        } elseif ($order->getStatus() === Order::STATUS_CANCELED) {
            $text = sprintf(
                self::EMAIL_TEXT_DECLINE,
                $customer->getEmail(),
                $customer->getFirstName(),
                $details['declineReason'] ?? '',
            );
        }
        $filename = dirname(__DIR__, 2) . "/var/mail/{$customer->getLastName()}_{$order->getId()}.txt";
        @file_put_contents($filename, $text);
    }
}
