<?php

namespace App\Service;

use App\BusinessLogic\CreditProduct\CreditProductRegistry;
use App\BusinessLogic\Modifiers\ProductModifiersRegistry;
use App\Contracts\CreditProductInterface;
use App\Contracts\CustomerInterface;

class PrepareProductsService
{
    /**
     * @param CustomerInterface $customer
     * @return CreditProductInterface[]
     */
    public function prepareForCustomer(CustomerInterface $customer): array
    {
        $allProducts = CreditProductRegistry::getAll();
        $modifiedProducts = [];
        $modifiers = ProductModifiersRegistry::getAll();

        foreach ($allProducts as $product) {
            foreach ($modifiers as $modifier) {
                $product = $modifier->modifyByCustomer($customer, $product);
            }
            $modifiedProducts[] = $product;
        }

        return $modifiedProducts;
    }

}
