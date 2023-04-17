<?php

namespace App\Entity;

use App\Repository\VehiculeORMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeORMRepository::class)]
class VehiculeORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $marque = null;

    #[ORM\Column(length: 50)]
    private ?string $gamme = null;

    #[ORM\ManyToMany(targetEntity: ComposantORM::class, inversedBy: 'vehicule_id')]
    private Collection $composant;

    #[ORM\ManyToOne(inversedBy: 'vehicule_id')]
    private ?CategorieORM $categorie = null;

    #[ORM\OneToOne(mappedBy: 'vehicule_id', cascade: ['persist', 'remove'])]
    private ?VoitureORM $voiture_id = null;

    #[ORM\Column]
    private ?int $nbrPlace = null;

    #[ORM\OneToOne(mappedBy: 'vehicule_id', cascade: ['persist', 'remove'])]
    private ?MotoORM $moto_id = null;

    #[ORM\OneToOne(mappedBy: 'vehicule_id', cascade: ['persist', 'remove'])]
    private ?CamionORM $camion_id = null;

    #[ORM\ManyToOne(inversedBy: 'vehicule_id')]
    private ?ConcessionORM $concession_id = null;

    public function __construct()
    {
        $this->composant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme): self
    {
        $this->gamme = $gamme;

        return $this;
    }

    /**
     * @return Collection<int, ComposantORM>
     */
    public function getComposant(): Collection
    {
        return $this->composant;
    }

    public function addComposant(ComposantORM $composant): self
    {
        if (!$this->composant->contains($composant)) {
            $this->composant->add($composant);
        }

        return $this;
    }

    public function removeComposant(ComposantORM $composant): self
    {
        $this->composant->removeElement($composant);

        return $this;
    }

    public function getCategorie(): ?CategorieORM
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieORM $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getVoitureId(): ?VoitureORM
    {
        return $this->voiture_id;
    }

    public function setVoitureId(?VoitureORM $voiture_id): self
    {
        // unset the owning side of the relation if necessary
        if ($voiture_id === null && $this->voiture_id !== null) {
            $this->voiture_id->setVehiculeId(null);
        }

        // set the owning side of the relation if necessary
        if ($voiture_id !== null && $voiture_id->getVehiculeId() !== $this) {
            $voiture_id->setVehiculeId($this);
        }

        $this->voiture_id = $voiture_id;

        return $this;
    }

    public function getNbrPlace(): ?int
    {
        return $this->nbrPlace;
    }

    public function setNbrPlace(int $nbrPlace): self
    {
        $this->nbrPlace = $nbrPlace;

        return $this;
    }

    public function getMotoId(): ?MotoORM
    {
        return $this->moto_id;
    }

    public function setMotoId(?MotoORM $moto_id): self
    {
        // unset the owning side of the relation if necessary
        if ($moto_id === null && $this->moto_id !== null) {
            $this->moto_id->setVehiculeId(null);
        }

        // set the owning side of the relation if necessary
        if ($moto_id !== null && $moto_id->getVehiculeId() !== $this) {
            $moto_id->setVehiculeId($this);
        }

        $this->moto_id = $moto_id;

        return $this;
    }

    public function getCamionId(): ?CamionORM
    {
        return $this->camion_id;
    }

    public function setCamionId(?CamionORM $camion_id): self
    {
        // unset the owning side of the relation if necessary
        if ($camion_id === null && $this->camion_id !== null) {
            $this->camion_id->setVehiculeId(null);
        }

        // set the owning side of the relation if necessary
        if ($camion_id !== null && $camion_id->getVehiculeId() !== $this) {
            $camion_id->setVehiculeId($this);
        }

        $this->camion_id = $camion_id;

        return $this;
    }

    public function getConcessionId(): ?ConcessionORM
    {
        return $this->concession_id;
    }

    public function setConcessionId(?ConcessionORM $concession_id): self
    {
        $this->concession_id = $concession_id;

        return $this;
    }
}
