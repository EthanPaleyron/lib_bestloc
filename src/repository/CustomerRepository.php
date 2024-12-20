<?php
namespace BestLoc\repository;

use BestLoc\database\MongodbConnection;
use BestLoc\entity\Customer;
use MongoDB\Collection;

class CustomerRepository
{
    private Collection $collection;

    public function __construct()
    {
        $connection = MongodbConnection::getInstance()->getConnection();
        $this->collection = $connection->selectCollection('customers');
    }

    public function create(Customer $data): bool
    {
        try {
            $this->collection->insertOne($data);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }

    public function findById(string $id): Customer|null
    {
        $result = $this->collection->findOne(['_id' => $id]);
        return $result;
    }

    public function update(Customer $customer): bool
    {
        try {
            $this->collection->updateOne([$customer->getId()], ['$set' => $customer]);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }

    public function delete(Customer $customer): bool
    {
        try {
            $this->collection->deleteOne([$customer->getId()]);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }
}
