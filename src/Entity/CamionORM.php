<?php

namespace App\Entity;

use App\Repository\CamionORMRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamionORMRepository::class)]
class CamionORM
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $PoidRemorquesMax = null;

    #[ORM\OneToOne(inversedBy: 'camion_id', cascade: ['persist', 'remove'])]
    private ?VehiculeORM $vehicule_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoidRemorquesMax(): ?int
    {
        return $this->PoidRemorquesMax;
    }

    public function setPoidRemorquesMax(int $PoidRemorquesMax): self
    {
        $this->PoidRemorquesMax = $PoidRemorquesMax;

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
