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

    public function find(int $email): ?Customer
    {
        $customer = $this->customer->findByEmail($email);
        if (!$customer) {
            $customer = null;
        }
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