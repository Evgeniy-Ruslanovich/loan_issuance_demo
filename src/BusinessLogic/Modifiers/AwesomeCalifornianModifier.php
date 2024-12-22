<?php

namespace App\BusinessLogic\Modifiers;

use App\Contracts\CreditProductInterface;
use App\Contracts\CustomerInterface;
use App\Contracts\ProductModifierInterface;
use App\Enum\StateCode;

class AwesomeCalifornianModifier implements ProductModifierInterface
{
    private const float INCREASE_RATE = 11.49;

    public function modifyByCustomer(
        CustomerInterface $customer,
        CreditProductInterface $creditProduct
    ): CreditProductInterface {
        if ($customer->getAddress()->getState() === StateCode::CA) {
            $creditProduct->increaseRate(self::INCREASE_RATE);
        }
        return $creditProduct;
    }
}
