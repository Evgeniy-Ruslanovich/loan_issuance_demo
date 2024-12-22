<?php

namespace App\Controller;

use App\Entity\Customer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer/list', name: 'customer_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $customers = $entityManager->getRepository(Customer::class)->findAll();
        return $this->render('customers.html.twig', ['customers' => $customers]);
    }

    #[Route('/customer/{id}', name: 'customer', methods: ['GET'])]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $customer = $entityManager->getRepository(Customer::class)->find($id);
        return $this->render('customer.html.twig', ['customer' => $customer]);
    }

    #[Route('/customer/create-form', name: 'create-customer')]
    public function createCustomerForm(): Response
    {
        return $this->render('customer_create_form.html.twig');
    }
}
