<?php
namespace App\Service;

use App\Entity\Billing;
use App\Repository\BillingRepository;

class BillingService
{
    private BillingRepository $billing;

    public function __construct()
    {
        $this->billing = new BillingRepository();
    }

    public function getAll(): array
    {
        return $this->billing->getAllBillings();
    }

    public function find(int $id): ?Billing
    {
        $billing = $this->billing->findBillingById($id);
        if (!$billing) {
            $billing = null;
        }
        return $billing;
    }

    public function getBillingFromContracts(int $contract_id): array
    {
        return $this->billing->getBillingFromContracts($contract_id);
    }

    public function create(int $contract_id, float $amount): bool
    {
        return $this->billing->insertBilling($contract_id, $amount);
    }

    public function update(int $id, int $contract_id, float $amount): bool
    {
        return $this->billing->updateBilling($id, $contract_id, $amount);
    }

    public function delete(int $id): bool
    {
        return $this->billing->deleteBilling($id);
    }
}