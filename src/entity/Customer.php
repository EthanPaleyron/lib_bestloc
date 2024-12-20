<?php
namespace BestLoc\entity;

use MongoDB\BSON\Persistable;
use MongoDB\BSON\ObjectId;

class Customer implements Persistable
{
    private ObjectId $_id;
    private string $firstName;
    private string $lastName;
    private string $address;
    private string $email;
    private string $password;
    private string $permitNumber;

    public function __construct(
        string $firstName,
        string $lastName,
        string $address,
        string $email,
        string $password,
        string $permitNumber
    ) {
        $this->_id = new ObjectId();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
        $this->permitNumber = $permitNumber;
    }

    public function bsonSerialize(): array
    {
        return [
            '_id' => $this->_id,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $this->password,
            'permit_number' => $this->permitNumber,
        ];
    }

    public function bsonUnserialize(array $data): void
    {
        $this->_id = $data['_id'];
        $this->firstName = $data['first_name'];
        $this->lastName = $data['last_name'];
        $this->address = $data['address'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->permitNumber = $data['permit_number'];
    }

    // Ajout de getters et setters si nécessaire
    public function getId(): ObjectId
    {
        return $this->_id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPermitNumber(): string
    {
        return $this->permitNumber;
    }

    public function setPermitNumber(string $permitNumber): void
    {
        $this->permitNumber = $permitNumber;
    }
}
