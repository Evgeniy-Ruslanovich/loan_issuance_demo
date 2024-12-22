<?php

namespace App\Contracts;

use App\BusinessLogic\CreditProduct\CreditProductDto;

interface CreditProductProviderInterface
{
    /**
     * @return CreditProductInterface[]
     */
    public function getAll(): array;

    public function getByCode(string $code): ?CreditProductInterface;
}
