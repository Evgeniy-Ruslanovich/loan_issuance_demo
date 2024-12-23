<?php

namespace App\Controller;

use App\BusinessLogic\CreditProduct\CreditProductDto;
use App\Entity\Customer;
use App\Service\LoanAvailabilityService;
use App\Service\OrderService;
use App\Service\PrepareProductsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LoanController extends AbstractController
{
    #[Route('/loan/check-availability/{customerId}', name: 'loan-check-availability', methods: ['GET'])]
    public function check(
        LoanAvailabilityService $loanAvailabilityService,
        EntityManagerInterface $entityManager,
        PrepareProductsService $prepareProductsService,
        int $customerId
    ): Response
    {
        $customer = $entityManager->getRepository(Customer::class)->find($customerId);
        $availableProducts = [];
        $declineReasons = $loanAvailabilityService->checkAvailabilityForCustomer($customer);
        if (empty($declineReasons)) {
            $availableProducts = $prepareProductsService->prepareForCustomer($customer);
        }

        return $this->render('loan_availability.html.twig', [
            'customer' => $customer,
            'declineReasons' => $declineReasons,
            'availableProducts' => $availableProducts,
        ]);
    }

    #[Route('/loan/issue', name: 'loan-issue', methods: ['POST'])]
    public function issue(
        Request $request,
        EntityManagerInterface $entityManager,
        OrderService $orderService
    ): Response
    {
        $data = $request->getPayload();
        $issuedLoan = new CreditProductDto(
            $data->get('code'),
            $data->get('name'),
            $data->get('bankName'),
            $data->get('rate'),
        );
        $customerId = $data->get('customerId');
        $customer = $entityManager->getRepository(Customer::class)->find($customerId);
        $order = $orderService->issueOrder($customer, $issuedLoan);

        return $this->redirectToRoute('order_get', ['id' => $order->getId()]);
    }

    #[Route('/loan/decline', name: 'loan-decline', methods: ['POST'])]
    public function decline(
        Request $request,
        EntityManagerInterface $entityManager,
        OrderService $orderService
    ): Response
    {
        $data = $request->getPayload();

        $declineReason = $data->get('declineReason');
        $customerId = $data->get('customerId');
        $customer = $entityManager->getRepository(Customer::class)->find($customerId);
        $order = $orderService->declineOrder($customer, $declineReason);

        return $this->redirectToRoute('order_get', ['id' => $order->getId()]);
    }
}
