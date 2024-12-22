<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFilterInterface;

class IncomeFilter implements LoanAvailabilityFilterInterface
{
    private const string DECLINE_REASON = 'Your monthly income is lower than ' . self::INCOME_LOWEST_RATE . '$';
    private const int INCOME_LOWEST_RATE = 1000;
    public function check(CustomerInterface $customer): ?string
    {
        if ($customer->getIncome() < self::INCOME_LOWEST_RATE) {
            return self::DECLINE_REASON;
        }
        return null;
    }
}
