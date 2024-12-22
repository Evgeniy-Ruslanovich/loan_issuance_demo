<?php

namespace App\Contracts;

interface CreditProductInterface
{
    public function getName(): string;

    public function getCode(): string;

    public function getBankName(): string;

    public function getRate(): float;

    public function increaseRate(float $rate): void;

    public function decreaseRate(float $rate): void;
}
