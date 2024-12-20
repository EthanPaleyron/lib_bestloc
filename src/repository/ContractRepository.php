<?php
namespace BestLoc\repository;

use BestLoc\database\MySQLConnection;
use PDO;
use BestLoc\entity\Contract;

class ContractRepository
{
    public function findContractById(int $id): Contract|false // Pouvoir accéder à un contrat en particulier à partir de sa clé unique.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getAllContracts(): array // Pouvoir lister tous les contrats
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        return $stmt->fetchAll();
    }
    public function insertContract(string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool // Pouvoir créer un nouveau contrat.
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

    public function updateContract(int $id, string $vehicule_uid, string $customer_uid, string $sign_date, string $loc_begin_date, string $loc_end_date, ?string $returning_date, float $price): bool // Pouvoir modifier/supprimer les données d’un contrat existant.
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
    public function findContractFromCustomerId(int $id): Contract|false // Pouvoir lister tous les contacts associés à un uid de Customer.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT id AS contract_id, vehicule_uid, customer_uid, sign_date, loc_begin_date, loc_end_date, returning_date, price FROM contract WHERE customer_uid = :id");
        $stmt->execute([
            ':id' => $id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getCurrentRentals(int $id): Contract|false // Pouvoir lister les locations (une location est correspond à un contrat dont le champ loc_begin_date est renseigné) en cours associées à un uid de Customer.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT id AS contract_id, vehicule_uid, customer_uid, sign_date, loc_begin_date, loc_end_date, returning_date, price FROM contract WHERE customer_uid = :id AND loc_begin_date IS NOT NULL AND loc_end_date > NOW() AND loc_begin_date <= NOW()");
        $stmt->execute([
            ':id' => $id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getLateRentals(): Contract|false // Pouvoir lister toutes les locations en retard (une location est dite « en retard » si returning_datetime est postérieur à loc_end_datetime de plus d’1 heure).
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT id AS contract_id, vehicule_uid, customer_uid, sign_date, loc_begin_date, loc_end_date, returning_date, price FROM contract WHERE returning_date IS NOT NULL AND TIMESTAMPDIFF(HOUR, loc_end_date, returning_date) > 1");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getCountLateBetweenTwoDates(string $date1, string $date2): array|false // Pouvoir compter le nombre de retard entre deux dates données.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT COUNT(*) FROM contract WHERE returning_date IS NOT NULL AND TIMESTAMPDIFF(HOUR, loc_end_date, returning_date) > 1 AND loc_end_date BETWEEN :date1 AND :date2");
        $stmt->execute([
            ':date1' => $date1,
            ':date2' => $date2,
        ]);
        $data = $stmt->fetch();
        return $data;
    }
    public function getCountLateMeansPerCustomer(): array|false // Pouvoir compter le nombre de retard moyens par Customer.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT COUNT(*) FROM contract WHERE returning_date IS NOT NULL AND TIMESTAMPDIFF(HOUR, loc_end_date, returning_date) > 1 GROUP BY customer_uid");
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }
    public function findContractByIdVehicule(int $vehicule_uid): Contract|false // Pouvoir lister tous les contrats où un certain véhicule a été utilisé.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract WHERE vehicule_uid = :vehicule_uid");
        $stmt->execute([
            ':vehicule_uid' => $vehicule_uid,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getAllContractsByVehiculeOrCustomer(): array|false // Pouvoir récupérer tous les contrats regroupés par véhicules ou par client/cliente.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM contract ORDER BY vehicule_uid, customer_uid");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Contract::class);
        $data = $stmt->fetchAll();
        return $data;
    }
}

