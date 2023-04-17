<?php

namespace App\Entity;

use App\Repository\CategorieORMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieORMRepository::class)]
class CategorieORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: VehiculeORM::class)]
    private Collection $vehicule_id;

    public function __construct()
    {
        $this->vehicule_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, VehiculeORM>
     */
    public function getVehiculeId(): Collection
    {
        return $this->vehicule_id;
    }

    public function addVehiculeId(VehiculeORM $vehiculeId): self
    {
        if (!$this->vehicule_id->contains($vehiculeId)) {
            $this->vehicule_id->add($vehiculeId);
            $vehiculeId->setCategorie($this);
        }

        return $this;
    }

    public function removeVehiculeId(VehiculeORM $vehiculeId): self
    {
        if ($this->vehicule_id->removeElement($vehiculeId)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeId->getCategorie() === $this) {
                $vehiculeId->setCategorie(null);
            }
        }

        return $this;
    }
}
