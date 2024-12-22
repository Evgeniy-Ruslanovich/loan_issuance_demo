<?php

namespace App\BusinessLogic\CreditProduct;

use App\Contracts\CreditProductInterface;

abstract class CreditProductRegistry
{
    /**
     * @return CreditProductInterface[]
     */
    public static function getAll(): array
    {
        $product1 = new CreditProductDto('normal', 'Normal loan for normal bro', 'Usual Bank inc.', 10.5);
        $product2 = new CreditProductDto('halal', 'Totally halal credit Zero rate for trusted people', 'Umma bank', 0);
        $product3 = new CreditProductDto('greedy', 'Terribly greedy loan for those who do not mind money', 'United greedy bank', 29.9);

        return [$product1, $product2, $product3];
    }

    public static function getByCode(string $code): ?CreditProductDto
    {
        $allProducts = self::getAll();
        foreach ($allProducts as $product) {
            if ($code === $product->getCode()) {
                return $product;
            }
        }
        return null;
    }
}
