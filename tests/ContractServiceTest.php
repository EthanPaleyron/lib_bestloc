<?php

namespace App\Tests;

use App\repository\ContractRepository;
use PHPUnit\Framework\TestCase;

final class ContractServiceTest extends TestCase
{
    public function testFindContractById(): void
    {
        $contract = new ContractRepository();
        $id = 2;
        $result = $contract->findContractById($id);
        $this->assertNotNull($result);
    }
    public function testGetAllContracts(): void
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
    public function testInsertContract(): void
    {
        $contractRepository = new ContractRepository();
        $vehicule_uid = 'TEST001';
        $customer_uid = 'CUST001';
        $sign_date = '2023-06-01';
        $loc_begin_date = '2023-06-02';
        $loc_end_date = '2023-06-10';
        $returning_date = '2023-06-09';
        $price = 100;

        $result = $contractRepository->insertContract(
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
        $id = 8;
        $vehicule_uid = 'TEST001';
        $customer_uid = 'CUST001';
        $sign_date = '2023-06-01';
        $loc_begin_date = '2023-06-02';
        $loc_end_date = '2023-06-10';
        $returning_date = '2023-06-09';
        $price = 100;

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
    public function testFindContractFromCustomerId(): void
    {
        $contractRepository = new ContractRepository();
        $id = 3;
        $result = $contractRepository->findContractFromCustomerId($id);
        $this->assertNotNull($result);
    }
    public function testGetCurrentRentals(): void
    {
        $contractRepository = new ContractRepository();
        $id = 3;
        $result = $contractRepository->getCurrentRentals($id);
        $this->assertNotNull($result);
    }
    public function testGetLateRentals(): void
    {
        $contractRepository = new ContractRepository();
        $result = $contractRepository->getLateRentals();
        $this->assertNotNull($result);
    }
    public function testGetLateCountBetweenTwoDates(): void
    {
        $contractRepository = new ContractRepository();
        $date1 = '2023-06-01';
        $date2 = '2024-06-01';
        $result = $contractRepository->getCountLateBetweenTwoDates($date1, $date2);

        $this->assertNotFalse($result);
    }
    public function testGetCountLateMeansPerCustomer(): void
    {
        $contractRepository = new ContractRepository();
        $result = $contractRepository->getCountLateMeansPerCustomer();

        $this->assertNotFalse($result);
    }
    public function testFindContractByIdVehicule(): void
    {
        $contract = new ContractRepository();
        $vehicule_uid = 2;
        $result = $contract->findContractByIdVehicule($vehicule_uid);
        $this->assertNotNull($result);
    }
    public function testGetAllContractsByVehiculeOrCustomer(): void
    {
        $contract = new ContractRepository();
        $results = $contract->getAllContractsByVehiculeOrCustomer();

        $this->assertNotNull($results);
        $this->assertIsArray($results);
        $this->assertNotEmpty($results);

        foreach ($results as $item) {
            $this->assertInstanceOf('App\Entity\Contract', $item);
        }
    }
}