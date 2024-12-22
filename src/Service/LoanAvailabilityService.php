<?php

namespace App\Service;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFiltersProviderInterface;

class LoanAvailabilityService
{
    private LoanAvailabilityFiltersProviderInterface $filterProvider;

    public function __construct(LoanAvailabilityFiltersProviderInterface $filterProvider)
    {
        $this->filterProvider = $filterProvider;
    }

    public function checkAvailabilityForCustomer(CustomerInterface $customer): array
    {
        $declineReasons = [];

        foreach($this->filterProvider->getAll() as $filter) {
            $declineReason = $filter->check($customer);
            if ($declineReason) {
                $declineReasons[] = $declineReason;
            }
        }

        return $declineReasons;
    }
}
