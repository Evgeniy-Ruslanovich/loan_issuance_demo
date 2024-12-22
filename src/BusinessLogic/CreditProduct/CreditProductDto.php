<?php

namespace App\BusinessLogic\CreditProduct;

use App\Contracts\CreditProductInterface;

class CreditProductDto implements CreditProductInterface
{
    private string $name;
    private string $code;
    private string $bankName;
    private float $rate;

    public function __construct(string $code, string $name, string $bankName, string $rate)
    {
        $this->code = $code;
        $this->name = $name;
        $this->bankName = $bankName;
        $this->rate = $rate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getBankName(): string
    {
        return $this->bankName;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function increaseRate(float $rate): void
    {
        $this->rate += $rate;
    }

    public function decreaseRate(float $rate): void
    {
        $this->rate -= $rate;
        if ($this->rate < 0) {
            $this->rate = 0;
        }
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'bankName' => $this->bankName,
            'rate' => $this->rate,
        ];
    }
}
