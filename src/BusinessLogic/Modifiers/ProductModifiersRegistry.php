<?php

namespace App\BusinessLogic\Modifiers;

use App\Contracts\ProductModifierInterface;

abstract class ProductModifiersRegistry
{
    /**
     * @return ProductModifierInterface[]
     */
    public static function getAll(): array
    {
        $modifier1 = new AwesomeCalifornianModifier();

        return [$modifier1];
    }
}
