<?php

namespace App\Contracts;

interface AddressInterface
{
    public function getState(): ?string;
    public function getCity(): ?string;
    public function getZip(): ?string;
    public function getAddress(): ?string;
}
