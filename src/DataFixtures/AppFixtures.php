<?php

namespace App\DataFixtures;

use App\Entity\localizacion;
use App\Entity\personaje;
use App\Entity\puesto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 1; $i <= 2; $i++) {
            $localizacion = new localizacion();
            $localizacion->setNombre("Estadio WLF");
            $manager->persist($localizacion);
        }

        for ($i = 1; $i <= 2; $i++) {
            $personaje = new personaje();
            $personaje->setNombre("Abby");
            $personaje->setDescripcion("");
            $manager->persist($personaje);
        }

        for ($i = 1; $i <= 2; $i++) {
            $puesto = new puesto();
            $puesto->setNumero(1);
            $puesto->setOcupacion([
                "WLF"
            ]);
            $puesto->setObservacion("Veterana francotiradora del WLF");
            $puesto->setLocalizacion("Estadio");
            $manager->persist($puesto);
        }

        $manager->flush();
    }
}
