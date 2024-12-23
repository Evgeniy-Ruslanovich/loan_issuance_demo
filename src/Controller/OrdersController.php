<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrdersController extends AbstractController
{
    #[Route('/order/list', name: 'order_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $orders = $entityManager->getRepository(Order::class)->findAll();
        return $this->render('orders.html.twig', ['orders' => $orders]);
    }

    #[Route('/order/get/{id}', name: 'order_get', methods: ['GET'])]
    public function get(EntityManagerInterface $entityManager, int $id): Response
    {
        $order = $entityManager->getRepository(Order::class)->find($id);
        return $this->render('orders.html.twig', ['orders' => [$order]]);
    }
}
