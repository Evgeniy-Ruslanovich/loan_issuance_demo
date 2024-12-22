<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Service\LoanAvailabilityService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LoanController extends AbstractController
{
    #[Route('/loan/check-availability/{customerId}', name: 'loan-check-availability', methods: ['GET'])]
    public function check(
        LoanAvailabilityService $loanAvailabilityService,
        EntityManagerInterface $entityManager,
        int $customerId
    ): Response
    {
        $customer = $entityManager->getRepository(Customer::class)->find($customerId);
        $declineReasons = $loanAvailabilityService->checkAvailabilityForCustomer($customer);
        return $this->render('loan_availability.html.twig', [
            'customer' => $customer,
            'declineReasons' => $declineReasons,
        ]);
    }
}
