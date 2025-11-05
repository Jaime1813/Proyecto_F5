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
        
        $localizaciones = ['Estadio WLF','Hospital de Seattle','Estación de radio','Hillcrest','Acuario','Túneles del metro','Barrio de Capitol Hill','Colegio'];
        foreach ($localizaciones as $nombre) {
            $localizacion = new Localizacion();
            $localizacion->setNombre($nombre);
            $manager->persist($localizacion);
        }

        $personajes = ['Abby','Manny','Nora','Mel','Owen','Isaac','Jordan','Leah'];
        foreach ($personajes as $nombre) {
            $personaje = new Personaje();
            $personaje->setNombre($nombre);
            $personaje->setDescripcion("Descripción de $nombre");
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
