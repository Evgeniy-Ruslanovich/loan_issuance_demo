<?php

namespace App\BusinessLogic\LoanAvailabilityFilters;

use App\Contracts\LoanAvailabilityFilterInterface;
use App\Contracts\LoanAvailabilityFiltersProviderInterface;

class LoanAvailabilityFiltersProvider implements LoanAvailabilityFiltersProviderInterface
{
    /**
     * @return LoanAvailabilityFilterInterface[]
     */
    public function getAll(): array
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
