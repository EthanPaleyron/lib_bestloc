<?php
namespace App\Service;

use App\Entity\Contract;
use App\Repository\ContractRepository;

class ContractService
{
    private ContractRepository $contract;

    public function __construct()
    {
        $this->contract = new ContractRepository();
    }

    public function getAll(): array
    {
        return $this->contract->getAllContracts();
    }

    public function find(int $id): ?contract
    {
        $contract = $this->contract->findContractById($id);
        if (!$contract) {
            $contract = null;
        }
        return $contract;
    }


    public function create(string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool
    {
        return $this->contract->insertContract($vehicule_uid, $customer_uid, $sign_date, $loc_begin_date, $loc_end_date, $returning_date, $price);
    }

    public function update(int $id, string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool
    {
        return $this->contract->updateContract($id, $vehicule_uid, $customer_uid, $sign_date, $loc_begin_date, $loc_end_date, $returning_date, $price);
    }

    public function delete(int $id): bool
    {
        return $this->contract->deleteContract($id);
    }
    public function findContractFromCustomerId(int $customer_uid): ?contract
    {
        return $this->contract->findContractFromCustomerId($customer_uid);
    }
    public function getCurrentRentals(int $customer_uid): ?contract
    {
        return $this->contract->getCurrentRentals($customer_uid);
    }
    public function getLateRentals(): ?contract
    {
        return $this->contract->getLateRentals();
    }
    public function getCountLateBetweenTwoDates(string $date1, string $date2): array
    {
        return $this->contract->getCountLateBetweenTwoDates($date1, $date2);
    }
    public function findContractByIdVehicule(int $vehicule_uid): ?contract
    {
        return $this->contract->findContractByIdVehicule($vehicule_uid);
    }
    public function getAllContractsByVehiculeOrCustomer(): array
    {
        return $this->contract->getAllContractsByVehiculeOrCustomer();
    }
}