<?php

namespace App\Entity;

use App\Repository\VoitureORMRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureORMRepository::class)]
class VoitureORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $taille = null;

    #[ORM\OneToOne(inversedBy: 'voiture_id', cascade: ['persist', 'remove'])]
    private ?VehiculeORM $vehicule_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getVehiculeId(): ?VehiculeORM
    {
        return $this->vehicule_id;
    }

    public function setVehiculeId(?VehiculeORM $vehicule_id): self
    {
        $this->vehicule_id = $vehicule_id;

        return $this;
    }
}
