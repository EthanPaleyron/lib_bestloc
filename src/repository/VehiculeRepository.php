<?php
namespace App\repository;

use App\database\MongodbConnection;
use App\entity\Vehicule;
use MongoDB\Collection;
use MongoDB\BSON\ObjectId;

class VehiculeRepository
{
    private Collection $collection;

    public function __construct()
    {
        $connection = MongodbConnection::getInstance()->getConnection();
        $this->collection = $connection->selectCollection('vehicules');
    }

    public function create(Vehicule $data): bool
    {
        try {
            $this->collection->insertOne($data);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }

    public function findById(string $id): Vehicule|null
    {
        $result = $this->collection->findOne(['_id' => new ObjectId($id)]);
        return $result;
    }

    public function findByLicencePlate(string $licencePlate): Vehicule|null
    {
        $result = $this->collection->findOne(['licence_plate' => $licencePlate]);
        return $result;
    }

    public function update(Vehicule $vehicule): bool
    {
        try {
            $this->collection->updateOne([$vehicule->getId()], ['$set' => $vehicule]);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }

    public function delete(Vehicule $vehicule): bool
    {
        try {
            $this->collection->deleteOne([$vehicule->getId()]);
            return true;
        } catch (\Exception $e) {
            print_r($e);
            return false;
        }
    }

    public function countByKm(int $km, int $comparator): int
    {
        $result = $this->collection->aggregate([
            ['$addFields' => ["km_num" => ['$toInt' => '$km']]],
            ['$match' => ["km_num" => [$comparator > 0 ? '$gt' : '$lt' => $km]]],
            ['$count' => 'total'],
        ]);
        $total = 0;
        foreach ($result as $doc) {
            $total = $doc['total'];
        }
        return $total;
    }
}
