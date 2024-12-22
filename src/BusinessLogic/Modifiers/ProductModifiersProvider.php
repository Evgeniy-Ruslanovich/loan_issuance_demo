<?php

namespace App\BusinessLogic\Modifiers;

use App\Contracts\ProductModifierInterface;
use App\Contracts\ProductModifiersProviderInterface;

class ProductModifiersProvider implements ProductModifiersProviderInterface
{
    /**
     * @return ProductModifierInterface[]
     */
    public function getAll(): array
    {
        $modifier1 = new AwesomeCalifornianModifier();

        return [$modifier1];
    }
}
