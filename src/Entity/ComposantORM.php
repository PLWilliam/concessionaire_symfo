<?php

namespace App\Entity;

use App\Repository\ComposantORMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposantORMRepository::class)]
class ComposantORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $denomination = null;

    #[ORM\Column(length: 50)]
    private ?string $code_barre = null;

    #[ORM\ManyToMany(targetEntity: VehiculeORM::class, mappedBy: 'composant')]
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

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getCodeBarre(): ?string
    {
        return $this->code_barre;
    }

    public function setCodeBarre(string $code_barre): self
    {
        $this->code_barre = $code_barre;

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
            $vehiculeId->addComposant($this);
        }

        return $this;
    }

    public function removeVehiculeId(VehiculeORM $vehiculeId): self
    {
        if ($this->vehicule_id->removeElement($vehiculeId)) {
            $vehiculeId->removeComposant($this);
        }

        return $this;
    }
}
