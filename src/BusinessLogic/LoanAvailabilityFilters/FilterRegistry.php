<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\LoanAvailabilityFilterInterface;

abstract class FilterRegistry
{
    /**
     * @return LoanAvailabilityFilterInterface[]
     */
    public static function getAll(): array
    {
        return [
            new AgeFilter(),
            new FicoFilter(),
            new IncomeFilter(),
            new StateFilter(),
            new FamousNewYorkRandomFilter(),
        ];
    }
}
