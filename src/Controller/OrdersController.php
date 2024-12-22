<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OrdersController extends AbstractController
{
    #[Route('/order/list', name: 'order_list', methods: ['GET'])]
    public function list(): Response
    {
        return $this->render('orders.html.twig');
    }
}
