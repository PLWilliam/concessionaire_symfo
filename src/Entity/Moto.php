<?php

namespace App\Entity;

use App\Repository\MotoRepository;
use Doctrine\ORM\Mapping as ORM;

class Moto extends Vehicule
{
    private ?int $taille;

    public function __construct($marque,$gamme,$composant,$nbrPlace,$categorie,$taille)
    {
        $this->setTaille($taille);
        parent::__construct($marque,$gamme,$composant,$nbrPlace,$categorie);
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille)
    {
        $this->taille = $taille;
    }
}
