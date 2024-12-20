<?php
namespace BestLoc\repository;

use BestLoc\database\MySQLConnection;
use PDO;
use BestLoc\entity\Billing;

class BillingRepository
{
    public function findBillingById(int $id): Billing|false
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM billing WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Billing::class);
        $data = $stmt->fetch();
        return $data;
    }
    public function getAllBillings(): array
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM billing");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, Billing::class);
        return $stmt->fetchAll();
    }
    public function insertBilling(string $contract_id, float $amount): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("INSERT INTO billing (contract_id, amount) VALUES (:contract_id, :amount)");

        return $stmt->execute([
            ':contract_id' => $contract_id,
            ':amount' => $amount,
        ]);
    }

    public function updateBilling(int $id, string $contract_id, float $amount): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("UPDATE billing SET contract_id = :contract_id, amount = :amount WHERE id = :id");

        return $stmt->execute([
            ':id' => $id,
            ':contract_id' => $contract_id,
            ':amount' => $amount,
        ]);
    }
    public function deleteBilling(int $id): bool
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("DELETE FROM billing WHERE id = :id");
        return $stmt->execute([
            ':id' => $id
        ]);
    }
    public function getBillingFromContracts(int $contract_id): array // Pouvoir lister toutes les factures associées à une location.
    {
        $stmt = MySQLConnection::getInstance()->getConnection()->prepare("SELECT * FROM billing WHERE contract_id = :contract_id");
        $stmt->execute([
            ':contract_id' => $contract_id,
        ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Billing::class);
        return $stmt->fetchAll();
    }
}
