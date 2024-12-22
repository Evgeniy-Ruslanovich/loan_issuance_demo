<?php

namespace App\Contracts;

interface LoanAvailabilityFiltersProviderInterface
{
    /**
     * @return LoanAvailabilityFilterInterface[]
     */
    public function getAll(): array;
}
