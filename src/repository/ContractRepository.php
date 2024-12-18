<?php
namespace App\repository;

use App\database\MySQLConnection;
use PDO;
use App\entity\Contract;

class ContractRepository
{
    public function findContractById(int $id): Contract|false
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getAllContracts(): array
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        return $stmt->fetchAll();
    }
    public function insertContract(string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("INSERT INTO contract (vehicule_uid, customer_uid, sign_date, loc_begin_date, loc_end_date, returning_date, price) VALUES (:vehicule_uid, :customer_uid, :sign_date, :loc_begin_date, :loc_end_date, :returning_date, :price)");

        return $stmt->execute([
            ':vehicule_uid' => $vehicule_uid,
            ':customer_uid' => $customer_uid,
            ':sign_date' => $sign_date,
            ':loc_begin_date' => $loc_begin_date,
            ':loc_end_date' => $loc_end_date,
            ':returning_date' => $returning_date,
            ':price' => $price
        ]);
    }

    public function updateContract(int $id, string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("UPDATE contract SET vehicule_uid = :vehicule_uid, customer_uid = :customer_uid, sign_date = :sign_date, loc_begin_date = :loc_begin_date, loc_end_date = :loc_end_date, returning_date = :returning_date, price = :price WHERE id = :id");

        return $stmt->execute([
            ':id' => $id,
            ':vehicule_uid' => $vehicule_uid,
            ':customer_uid' => $customer_uid,
            ':sign_date' => $sign_date,
            ':loc_begin_date' => $loc_begin_date,
            ':loc_end_date' => $loc_end_date,
            ':returning_date' => $returning_date,
            ':price' => $price
        ]);
    }
    public function deleteContract(int $id): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("DELETE FROM contract WHERE id = :id");
        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
