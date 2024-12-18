<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer/list', name: 'customer_list', methods: ['GET'])]
    public function list(): Response
    {
        return $this->render('customers.html.twig');
    }

    #[Route('/customer/create-form', name: 'create-customer')]
    public function createCustomerForm(): Response
    {
        return $this->render('customer_create_form.html.twig');
    }
}
