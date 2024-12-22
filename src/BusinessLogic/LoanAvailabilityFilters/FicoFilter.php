<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFilterInterface;

class FicoFilter implements LoanAvailabilityFilterInterface
{
    private const string DECLINE_REASON = 'FICO rate is too low';
    private const int FICO_LOWEST_RATE = 500;
    public function check(CustomerInterface $customer): ?string
    {
        if ($customer->getFico() < self::FICO_LOWEST_RATE) {
            return self::DECLINE_REASON;
        }
        return null;
    }
}
