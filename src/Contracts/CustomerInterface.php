<?php

namespace App\Contracts;

interface CustomerInterface
{
    public function getFirstName(): ?string;
    public function getLastName(): ?string;
    public function getAge(): ?int;
    public function getSsn(): ?string;
    public function getFico(): ?int;
    public function getEmail(): ?string;
    public function getPhoneNumber(): ?string;
    public function getAddress(): ?AddressInterface;
    public function getIncome(): ?int;
}
