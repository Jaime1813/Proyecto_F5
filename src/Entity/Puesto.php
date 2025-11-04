<?php

namespace App\Entity;

use App\Repository\PuestoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PuestoRepository::class)]
class Puesto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $puesto = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $ocupacion = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observacion = null;

    #[ORM\ManyToOne(inversedBy: 'puestos')]
    private ?Localizacion $localizacion = null;

    #[ORM\ManyToOne(inversedBy: 'puestos')]
    private ?Personaje $personaje = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $armas = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $tipoZombie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuesto(): ?int
    {
        return $this->puesto;
    }

    public function setPuesto(int $puesto): static
    {
        $this->puesto = $puesto;

        return $this;
    }

    public function getOcupacion(): array
    {
        return $this->ocupacion;
    }

    public function setOcupacion(array $ocupacion): static
    {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): static
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getLocalizacion(): ?Localizacion
    {
        return $this->localizacion;
    }

    public function setLocalizacion(?Localizacion $localizacion): static
    {
        $this->localizacion = $localizacion;

        return $this;
    }

    public function getPersonaje(): ?Personaje
    {
        return $this->personaje;
    }

    public function setPersonaje(?Personaje $personaje): static
    {
        $this->personaje = $personaje;

        return $this;
    }

    public function getArmas(): ?array
    {
        return $this->armas;
    }

    public function setArmas(?array $armas): static
    {
        $this->armas = $armas;

        return $this;
    }

    public function getTipoZombie(): ?array
    {
        return $this->tipoZombie;
    }

    public function setTipoZombie(?array $tipoZombie): static
    {
        $this->tipoZombie = $tipoZombie;

        return $this;
    }
}
