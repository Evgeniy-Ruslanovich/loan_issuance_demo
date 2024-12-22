<?php

namespace App\Service;

use App\BusinessLogic\LoanAvailabilityFilters\FilterRegistry;
use App\Contracts\CustomerInterface;

class LoanAvailabilityService
{
    public function checkAvailabilityForCustomer(CustomerInterface $customer): array
    {
        $declineReasons = [];

        foreach(FilterRegistry::getAll() as $filter) {
            $declineReason = $filter->check($customer);
            if ($declineReason) {
                $declineReasons[] = $declineReason;
            }
        }

        return $declineReasons;
    }
}
