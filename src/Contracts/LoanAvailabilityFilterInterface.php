<?php

namespace App\Contracts;

interface LoanAvailabilityFilterInterface
{
    public function check(CustomerInterface $customer): ?string;
}
