<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Customer;
use App\Enum\StateCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CustomerController extends AbstractController
{
    #[Route('/customer/list', name: 'customer_list', methods: ['GET'])]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $customers = $entityManager->getRepository(Customer::class)->findAll();
        return $this->render('customers.html.twig', ['customers' => $customers]);
    }

    #[Route('/customer/get/{id}', name: 'customer_get', methods: ['GET'])]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $customer = $entityManager->getRepository(Customer::class)->find($id);
        return $this->render('customer.html.twig', ['customer' => $customer, 'states' => StateCode::CODES_WITH_NAMES]);
    }

    #[Route('/customer/create', name: 'customer_create_form', methods: ['GET'])]
    public function createCustomerForm(): Response
    {
        return $this->render('customer_create_form.html.twig',  ['states' => StateCode::CODES_WITH_NAMES]);
    }

    #[Route('/customer/create', name: 'customer_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->getPayload();
        $address = new Address();
        // TODO validate input and search existed address
        // if two men live in same house
        $address
            ->setState($data->get('state'))
            ->setCity($data->get('city'))
            ->setZip($data->get('zip'))
            ->setAddress($data->get('address'));
        $entityManager->persist($address);
        $customer = new Customer();
        $customer
            ->setAddress($address)
            ->setFirstName($data->get('firstName'))
            ->setLastName($data->get('lastName'))
            ->setEmail($data->get('email'))
            ->setFico($data->get('fico'))
            ->setIncome($data->get('income'))
            ->setSsn($data->get('ssn'))
            ->setAge($data->get('age'))
            ->setPhoneNumber($data->get('phoneNumber'));
        $entityManager->persist($customer);
        $entityManager->flush();

        return $this->redirectToRoute('customer_get', ['id' => $customer->getId()]);
    }

    #[Route('/customer/edit/{id}', name: 'customer_edit', methods: ['POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, int $id): Response
    {
        $data = $request->getPayload();
        $customer = $entityManager->getRepository(Customer::class)->find($id);
        $address = $customer->getAddress();
        $address
            ->setState($data->get('state'))
            ->setCity($data->get('city'))
            ->setZip($data->get('zip'))
            ->setAddress($data->get('address'));

        $customer
            ->setFirstName($data->get('firstName'))
            ->setLastName($data->get('lastName'))
            ->setEmail($data->get('email'))
            ->setFico($data->get('fico'))
            ->setIncome($data->get('income'))
            ->setSsn($data->get('ssn'))
            ->setAge($data->get('age'))
            ->setPhoneNumber($data->get('phoneNumber'));

        $entityManager->persist($address);
        $entityManager->persist($customer);
        $entityManager->flush();

        return $this->redirectToRoute('customer_get', ['id' => $customer->getId()]);
    }
}
