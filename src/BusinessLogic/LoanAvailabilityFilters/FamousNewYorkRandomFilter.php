<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFilterInterface;
use App\Enum\StateCode;

class FamousNewYorkRandomFilter implements LoanAvailabilityFilterInterface
{
    private const string DECLINE_REASON = 'Sorry bro, this is New York, you\'re just unlucky. Don\'t give up trying, and one day luck will smile';

    public function check(CustomerInterface $customer): ?string
    {
        if ($customer->getAddress()->getState() !== StateCode::NY) {
            return null;
        }
        if (rand(0,100) <= 50) {
            return self::DECLINE_REASON;
        }
        return null;
    }
}
