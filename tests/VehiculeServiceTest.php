<?php

namespace App\Tests;

use App\repository\VehiculeRepository;
use App\entity\Vehicule;
use PHPUnit\Framework\TestCase;

class VehiculeServiceTest extends TestCase
{
    public function testCreate(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $vehicule = new Vehicule("Golf", "VolksWagen", "BX-259-AN", "C'est une break à Lyon !!!", 130000);

        $result = $vehiculeRepository->create($vehicule);

        $this->assertTrue($result);
    }
    public function testFindById(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $id = "6764343b9505e612660225f1";
        $result = $vehiculeRepository->findById($id);

        $this->assertNotNull($result);
    }
    public function testFindByLicencePlate(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $licencePlate = "BX-259-AN";
        $result = $vehiculeRepository->findByLicencePlate($licencePlate);

        $this->assertNotNull($result);
    }
    public function testUpdate(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $id = "6764343b9505e612660225f1";
        $vehicule = $vehiculeRepository->findById($id);
        $vehicule->setKm(69);

        $result = $vehiculeRepository->update($vehicule);

        $this->assertTrue($result);
    }
    public function testDelete(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $id = "6764343b9505e612660225f1";
        $vehicule = $vehiculeRepository->findById($id);

        $result = $vehiculeRepository->delete($vehicule);

        $this->assertTrue($result);
    }
    public function testCountByKmFloor(): void
    {
        $vehiculeRepository = new VehiculeRepository();
        $total = $vehiculeRepository->countByKm(1734524193, 1);
        $this->assertEquals(4, $total, "Documents count has not the expected value !");
    }
}
