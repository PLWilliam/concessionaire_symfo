<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

class Voiture extends Vehicule
{
    private ?float $taille_coffre;

    public function __construct($marque,$gamme,$composant,$nbrPlace,$categorie,$taille_coffre)
    {
        $this->setTailleCoffre($taille_coffre);
        parent::__construct($marque,$gamme,$composant,$nbrPlace,$categorie);
    }

    public function getTailleCoffre(): ?float
    {
        return $this->taille_coffre;
    }

    public function setTailleCoffre(float $taille_coffre)
    {
        $this->taille_coffre = $taille_coffre;
    }
}
