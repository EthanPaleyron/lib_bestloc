<?php
namespace BestLoc\Service;

use BestLoc\Entity\Vehicule;
use BestLoc\Repository\VehiculeRepository;

class VehiculeService
{
    private VehiculeRepository $vehicule;

    public function __construct()
    {
        $this->vehicule = new VehiculeRepository();
    }

    public function find(int $id): ?Vehicule
    {
        $vehicule = $this->vehicule->findById($id);
        if (!$vehicule) {
            $vehicule = null;
        }
        return $vehicule;
    }
    public function findByLicencePlate(string $licencePlate): ?Vehicule
    {
        $vehicule = $this->vehicule->findByLicencePlate($licencePlate);
        if (!$vehicule) {
            $vehicule = null;
        }
        return $vehicule;
    }
    public function create(Vehicule $vehicule): bool
    {
        return $this->vehicule->create($vehicule);
    }

    public function update(Vehicule $vehicule): bool
    {
        return $this->vehicule->update($vehicule);
    }

    public function delete(Vehicule $vehicule): bool
    {
        return $this->vehicule->delete($vehicule);
    }
    public function countByKm(int $km, int $comparator): int
    {
        return $this->vehicule->countByKm($km, $comparator);
    }
}