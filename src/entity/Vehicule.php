<?php
namespace App\Entity;

use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;

class Vehicule implements Persistable
{
    private ObjectId $_id;
    private string $model;
    private string $brand;
    private string $licencePlate;
    private string $informations;
    private int $km;

    public function __construct(
        string $model,
        string $brand,
        string $licencePlate,
        string $informations,
        int $km
    ) {
        $this->_id = new ObjectId();
        $this->model = $model;
        $this->brand = $brand;
        $this->licencePlate = $licencePlate;
        $this->informations = $informations;
        $this->km = $km;
    }

    public function bsonSerialize(): array
    {
        return [
            '_id' => $this->_id,
            'model' => $this->model,
            'brand' => $this->brand,
            'licence_plate' => $this->licencePlate,
            'informations' => $this->informations,
            'km' => $this->km,
        ];
    }

    public function bsonUnserialize(array $data): void
    {
        $this->_id = $data['_id'];
        $this->model = $data['model'];
        $this->brand = $data['brand'];
        $this->licencePlate = $data['licence_plate'];
        $this->informations = $data['informations'];
        $this->km = $data['km'];
    }

    // Getters et Setters
    public function getId(): ObjectId
    {
        return $this->_id;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getLicencePlate(): string
    {
        return $this->licencePlate;
    }

    public function setLicencePlate(string $licencePlate): void
    {
        $this->licencePlate = $licencePlate;
    }

    public function getInformations(): string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): void
    {
        $this->informations = $informations;
    }

    public function getKm(): int
    {
        return $this->km;
    }

    public function setKm(int $km): void
    {
        $this->km = $km;
    }
}
