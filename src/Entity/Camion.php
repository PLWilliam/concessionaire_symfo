<?php

namespace App\Entity;

use App\Repository\CamionRepository;
use Doctrine\ORM\Mapping as ORM;

class Camion extends Vehicule
{
    private ?int $poid_remorques_max;

    public function __construct($marque,$gamme,$composant,$nbrPlace,$categorie,$poid_remorques_max)
    {
        $this->setPoidRemorquesMax($poid_remorques_max);
        parent::__construct($marque,$gamme,$composant,$nbrPlace,$categorie);
    }

    public function getPoidRemorquesMax(): ?int
    {
        return $this->poid_remorques_max;
    }

    public function setPoidRemorquesMax(int $poid_remorques_max)
    {
        $this->poid_remorques_max = $poid_remorques_max;
    }
}
