<?php

namespace App\Entity;

use App\Repository\PersonajeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonajeRepository::class)]
class Personaje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descripcion = null;

    /**
     * @var Collection<int, Puesto>
     */
    #[ORM\OneToMany(targetEntity: Puesto::class, mappedBy: 'personaje')]
    private Collection $puestos;

    public function __construct()
    {
        $this->puestos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection<int, Puesto>
     */
    public function getPuestos(): Collection
    {
        return $this->puestos;
    }

    public function addPuesto(Puesto $puesto): static
    {
        if (!$this->puestos->contains($puesto)) {
            $this->puestos->add($puesto);
            $puesto->setPersonaje($this);
        }

        return $this;
    }

    public function removePuesto(Puesto $puesto): static
    {
        if ($this->puestos->removeElement($puesto)) {
            // set the owning side to null (unless already changed)
            if ($puesto->getPersonaje() === $this) {
                $puesto->setPersonaje(null);
            }
        }

        return $this;
    }
}
