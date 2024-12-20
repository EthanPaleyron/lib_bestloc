<?php
namespace BestLoc\Service;

use BestLoc\Entity\Customer;
use BestLoc\Repository\CustomerRepository;

class CustomerService
{
    private CustomerRepository $customer;

    public function __construct()
    {
        $this->customer = new CustomerRepository();
    }

    public function find(string $id): ?Customer
    {
        $customer = $this->customer->findById($id);
        return $customer;
    }

    public function findAll(): array
    {
        $customer = $this->customer->findAll();
        return $customer;
    }

    public function create(Customer $customer): bool
    {
        return $this->customer->create($customer);
    }

    public function update(Customer $customer): bool
    {
        return $this->customer->update($customer);
    }

    public function delete(Customer $customer): bool
    {
        return $this->customer->delete($customer);
    }
}