<?php

namespace App\Service;

use App\Contracts\CreditProductInterface;
use App\Contracts\CustomerInterface;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private EntityManagerInterface $entityManager;
    private NotificationService $notificationService;

    public function __construct(
        EntityManagerInterface $entityManager,
        NotificationService $notificationService,
    ) {
        $this->entityManager = $entityManager;
        $this->notificationService = $notificationService;
    }
    public function issueOrder(CustomerInterface $customer, CreditProductInterface $creditProduct): Order
    {
        $order = new Order();
        $order
            ->setCustomer($customer)
            ->setStatus(Order::STATUS_ISSUED)
            ->setDetails($creditProduct->toArray());
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->notificationService->notify($customer, $order);

        return $order;
    }

    public function declineOrder(CustomerInterface $customer, string $declineReason): Order
    {
        $order = new Order();
        $order
            ->setCustomer($customer)
            ->setStatus(Order::STATUS_CANCELED)
            ->setDetails(['declineReason' => $declineReason]);
        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->notificationService->notify($customer, $order);

        return $order;
    }
}
