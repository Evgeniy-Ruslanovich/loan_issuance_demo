<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\CustomerInterface;
use App\Contracts\LoanAvailabilityFilterInterface;
use App\Enum\StateCode;

class StateFilter implements LoanAvailabilityFilterInterface
{
    private const array AVAILABLE_STATES = [StateCode::NY, StateCode::CA, StateCode::NV];

    public function check(CustomerInterface $customer): ?string
    {
        if (!in_array($customer->getAddress()->getState(), self::AVAILABLE_STATES, true)) {
            return $this->getDeclineReason();
        }
        return null;
    }

    private function getDeclineReason(): string
    {
        return 'We only approve loans in the following states: ' . implode(', ', self::AVAILABLE_STATES);
    }
}
