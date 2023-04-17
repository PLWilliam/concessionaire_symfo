<?php

namespace App\Entity;

use App\Repository\ConcessionORMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcessionORMRepository::class)]
class ConcessionORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $rue = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $code_postal = null;

    #[ORM\OneToMany(mappedBy: 'concession_id', targetEntity: VehiculeORM::class)]
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

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

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
            $vehiculeId->setConcessionId($this);
        }

        return $this;
    }

    public function removeVehiculeId(VehiculeORM $vehiculeId): self
    {
        if ($this->vehicule_id->removeElement($vehiculeId)) {
            // set the owning side to null (unless already changed)
            if ($vehiculeId->getConcessionId() === $this) {
                $vehiculeId->setConcessionId(null);
            }
        }

        return $this;
    }
}
