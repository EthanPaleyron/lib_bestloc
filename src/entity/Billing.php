<?php
namespace App\entity;

class Billing
{
    private int $id;
    private string $contract_id;
    private float $amount;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setContractId(int $contract_id): void
    {
        $this->contract_id = $contract_id;
    }

    public function getContractId(): string
    {
        return $this->contract_id;
    }
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): string
    {
        return $this->contract_id;
    }
}