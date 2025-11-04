<?php

namespace App\Entity;

use App\Repository\LocalizacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalizacionRepository::class)]
class Localizacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    /**
     * @var Collection<int, Puesto>
     */
    #[ORM\OneToMany(targetEntity: Puesto::class, mappedBy: 'localizacion')]
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
            $puesto->setLocalizacion($this);
        }

        return $this;
    }

    public function removePuesto(Puesto $puesto): static
    {
        if ($this->puestos->removeElement($puesto)) {
            // set the owning side to null (unless already changed)
            if ($puesto->getLocalizacion() === $this) {
                $puesto->setLocalizacion(null);
            }
        }

        return $this;
    }
}
