<?php

namespace BestLoc\Tests;

use BestLoc\repository\CustomerRepository;
use BestLoc\entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerServiceTest extends TestCase
{
    public function testCreate(): void
    {
        $customerRepository = new CustomerRepository();
        $customer = new Customer("Ethan", "Paleyron", "adress", "test@example.com", "hjehfjehzfe", "B");

        $result = $customerRepository->create($customer);

        $this->assertTrue($result);
    }

    public function testFindByEmail(): void
    {
        $customerRepository = new CustomerRepository();
        $email = "test@example.com";
        $result = $customerRepository->findByEmail($email);

        $this->assertNotNull($result);
    }
    public function testUpdate(): void
    {
        $customerRepository = new CustomerRepository();
        $email = "test@example.com";
        $customer = $customerRepository->findByEmail($email);
        $customer->setFirstName("Tatane");

        $result = $customerRepository->update($customer);

        $this->assertTrue($result);
    }
    public function testDelete(): void
    {
        $customerRepository = new CustomerRepository();
        $email = "test@example.com";
        $customer = $customerRepository->findByEmail($email);

        $result = $customerRepository->delete($customer);

        $this->assertTrue($result);
    }
}
