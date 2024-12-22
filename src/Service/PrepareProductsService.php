<?php

namespace App\Service;

use App\Contracts\CreditProductInterface;
use App\Contracts\CreditProductProviderInterface;
use App\Contracts\CustomerInterface;
use App\Contracts\ProductModifiersProviderInterface;

class PrepareProductsService
{
    private CreditProductProviderInterface $creditProductProvider;
    private ProductModifiersProviderInterface $productModifiersProvider;

    public function __construct(
        CreditProductProviderInterface $creditProductProvider,
        ProductModifiersProviderInterface $productModifiersProvider,
    ) {
        $this->creditProductProvider = $creditProductProvider;
        $this->productModifiersProvider = $productModifiersProvider;
    }

    /**
     * @param CustomerInterface $customer
     * @return CreditProductInterface[]
     */
    public function prepareForCustomer(CustomerInterface $customer): array
    {
        $allProducts = $this->creditProductProvider->getAll();
        $modifiedProducts = [];
        $modifiers = $this->productModifiersProvider->getAll();

        foreach ($allProducts as $product) {
            foreach ($modifiers as $modifier) {
                $product = $modifier->modifyByCustomer($customer, $product);
            }
            $modifiedProducts[] = $product;
        }

        return $modifiedProducts;
    }

}
