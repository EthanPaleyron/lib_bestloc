<?php

namespace App\Tests;

use App\repository\ContractRepository;
use PHPUnit\Framework\TestCase;

final class ContractServiceTest extends TestCase
{
    public function testfindContractById(): void
    {
        $contract = new ContractRepository();
        $id = 2;
        $result = $contract->findContractById($id);
        $this->assertNotNull($result);
    }
    public function testgetAllContracts(): void
    {
        $contract = new ContractRepository();
        $results = $contract->getAllContracts();

        $this->assertNotNull($results);
        $this->assertIsArray($results);
        $this->assertNotEmpty($results);

        foreach ($results as $item) {
            $this->assertInstanceOf('App\Entity\Contract', $item);
        }
    }
    public function testinsertContract(): void
    {
        $contractRepository = new ContractRepository();
        $id = 3;
        $vehicule_uid = 'TEST001';
        $customer_uid = 'CUST001';
        $sign_date = '2023-06-01';
        $loc_begin_date = '2023-06-02';
        $loc_end_date = '2023-06-10';
        $returning_date = '2023-06-09';
        $price = 100.00;

        $result = $contractRepository->updateContract(
            $id,
            $vehicule_uid,
            $customer_uid,
            $sign_date,
            $loc_begin_date,
            $loc_end_date,
            $returning_date,
            $price
        );
        $this->assertTrue($result);
    }
    public function testUpdateContract(): void
    {
        $contractRepository = new ContractRepository();
        $id = 3;
        $vehicule_uid = 'TEST001';
        $customer_uid = 'CUST001';
        $sign_date = '2023-06-01';
        $loc_begin_date = '2023-06-02';
        $loc_end_date = '2023-06-10';
        $returning_date = '2023-06-09';
        $price = 100.00;

        $result = $contractRepository->updateContract(
            $id,
            $vehicule_uid,
            $customer_uid,
            $sign_date,
            $loc_begin_date,
            $loc_end_date,
            $returning_date,
            $price
        );
        $this->assertTrue($result);
    }
    public function testDeleteContract(): void
    {
        $contractRepository = new ContractRepository();
        $id = 2;
        $result = $contractRepository->deleteContract($id);
        $this->assertTrue($result);
    }
}