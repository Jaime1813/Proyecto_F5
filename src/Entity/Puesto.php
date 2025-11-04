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
    private ?int $numero = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $ocupacion = [];

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getnumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

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
    
    private ?string $localizacion = null;

    public function getLocalizacion(): ?string
    {
        return $this->localizacion;
    }

    public function setLocalizacion(?string $localizacion): static
    {
        $this->localizacion = $localizacion;
        return $this;
    }

}
