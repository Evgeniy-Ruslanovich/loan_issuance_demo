<?php

namespace App\Contracts;

interface ProductModifiersProviderInterface
{
    /**
     * @return ProductModifierInterface[]
     */
    public function getAll(): array;
}
