<?php

class Contract
{
    private int $id;
    private string $vehiculeUid;
    private string $customerUid;
    private DateTime $signDate;
    private DateTime $locBeginDate;
    private DateTime $locEndDate;
    private ?DateTime $returningDate;
    private float $price;

    public function __construct(string $vehiculeUid, string $customerUid, DateTime $signDate, DateTime $locBeginDate, DateTime $locEndDate, ?DateTime $returningDate, float $price)
    {
        $this->setVehiculeUid($vehiculeUid);
        $this->setCustomerUid($customerUid);
        $this->setSignDate($signDate);
        $this->setLocBeginDate($locBeginDate);
        $this->setLocEndDate($locEndDate);
        $this->setReturningDate($returningDate);
        $this->setPrice($price);
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setVehiculeUid(string $vehiculeUid): void
    {
        $this->vehiculeUid = $vehiculeUid;
    }
    public function getVehiculeUid(): string
    {
        return $this->vehiculeUid;
    }
    public function setCustomerUid(string $customerUid): void
    {
        $this->customerUid = $customerUid;
    }
    public function getCustomerUid(): string
    {
        return $this->customerUid;
    }
    public function setSignDate(DateTime $signDate): void
    {
        $this->signDate = $signDate;
    }
    public function getSignDate(): DateTime
    {
        return $this->signDate;
    }
    public function setLocBeginDate(DateTime $locBeginDate): void
    {
        $this->locBeginDate = $locBeginDate;
    }
    public function getLocBeginDate(): DateTime
    {
        return $this->locBeginDate;
    }
    public function setLocEndDate(DateTime $locEndDate): void
    {
        $this->locEndDate = $locEndDate;
    }
    public function getLocEndDate(): DateTime
    {
        return $this->locEndDate;
    }
    public function setReturningDate(?DateTime $returningDate): void
    {
        $this->returningDate = $returningDate;
    }
    public function getReturningDate(): ?DateTime
    {
        return $this->returningDate;
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
