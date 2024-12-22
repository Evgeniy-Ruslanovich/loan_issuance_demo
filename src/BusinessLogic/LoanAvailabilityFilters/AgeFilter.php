<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFilterInterface;

class AgeFilter implements LoanAvailabilityFilterInterface
{
    private const string DECLINE_REASON_TOO_YONG = 'Your age must be higher than ' . self::LOWEST_AGE . ' years';
    private const string DECLINE_REASON_TOO_OLD = 'Your age must be lower than ' . self::HIGHEST_AGE . ' years';
    private const int LOWEST_AGE = 18;
    private const int HIGHEST_AGE = 60;
    public function check(CustomerInterface $customer): ?string
    {
        if ($customer->getAge() < self::LOWEST_AGE) {
            return self::DECLINE_REASON_TOO_YONG;
        }
        if ($customer->getAge() > self::HIGHEST_AGE) {
            return self::DECLINE_REASON_TOO_OLD;
        }
        return null;
    }
}
