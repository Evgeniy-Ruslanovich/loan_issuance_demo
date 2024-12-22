<?php

namespace App\Contracts;

interface ProductModifierInterface
{
    public function modifyByCustomer(CustomerInterface $customer, CreditProductInterface $creditProduct): CreditProductInterface;
}
