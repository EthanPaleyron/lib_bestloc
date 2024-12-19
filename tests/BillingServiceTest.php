<?php

namespace App\Tests;

use App\repository\BillingRepository;
use PHPUnit\Framework\TestCase;

final class BillingServiceTest extends TestCase
{
    public function testfindBillingById(): void
    {
        $Billing = new BillingRepository();
        $id = 2;
        $result = $Billing->findBillingById($id);
        $this->assertNotNull($result);
    }
    public function testgetAllBillings(): void
    {
        $Billing = new BillingRepository();
        $results = $Billing->getAllBillings();

        $this->assertNotNull($results);
        $this->assertIsArray($results);
        $this->assertNotEmpty($results);

        foreach ($results as $item) {
            $this->assertInstanceOf('App\Entity\Billing', $item);
        }
    }
    public function testinsertBilling(): void
    {
        $BillingRepository = new BillingRepository();
        $id = 4;
        $contract_id = '5';
        $amount = 100.00;

        $result = $BillingRepository->updateBilling(
            $id,
            $contract_id,
            $amount
        );
        $this->assertTrue($result);
    }
    public function testUpdateBilling(): void
    {
        $BillingRepository = new BillingRepository();
        $id = 3;
        $contract_id = 'TEST001';
        $amount = 100.00;

        $result = $BillingRepository->updateBilling(
            $id,
            $contract_id,
            $amount
        );
        $this->assertTrue($result);
    }
    public function testDeleteBilling(): void
    {
        $BillingRepository = new BillingRepository();
        $id = 2;
        $result = $BillingRepository->deleteBilling($id);
        $this->assertTrue($result);
    }
    public function testgetBillingFromContracts(): void
    {
        $billing = new BillingRepository();
        $id_contract = 3;
        $results = $billing->getBillingFromContracts($id_contract);

        $this->assertNotNull($results);
        $this->assertIsArray($results);
        $this->assertNotEmpty($results);

        foreach ($results as $item) {
            $this->assertInstanceOf('App\Entity\Billing', $item);
        }
    }
}