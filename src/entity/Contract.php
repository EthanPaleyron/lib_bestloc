<?php
namespace App\entity;

class Contract
{
    private int $id;
    private string $vehicule_uid;
    private string $customer_uid;
    private string $sign_date;
    private string $loc_begin_date;
    private string $loc_end_date;
    private ?string $returning_date;
    private float $price;

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setVehiculeUid(string $vehicule_uid): void
    {
        $this->vehicule_uid = $vehicule_uid;
    }
    public function getVehiculeUid(): string
    {
        return $this->vehicule_uid;
    }
    public function setCustomerUid(string $customer_uid): void
    {
        $this->customer_uid = $customer_uid;
    }
    public function getCustomerUid(): string
    {
        return $this->customer_uid;
    }
    public function setSignDate(string $sign_date): void
    {
        $this->sign_date = $sign_date;
    }
    public function getSignDate(): string
    {
        return $this->sign_date;
    }
    public function setLocBeginDate(string $loc_begin_date): void
    {
        $this->loc_begin_date = $loc_begin_date;
    }
    public function getLocBeginDate(): string
    {
        return $this->loc_begin_date;
    }
    public function setLocEndDate(string $loc_end_date): void
    {
        $this->loc_end_date = $loc_end_date;
    }
    public function getLocEndDate(): string
    {
        return $this->loc_end_date;
    }
    public function setReturningDate(?string $returning_date): void
    {
        $this->returning_date = $returning_date;
    }
    public function getReturningDate(): ?string
    {
        return $this->returning_date;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
}
