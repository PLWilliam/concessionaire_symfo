<?php

namespace App\Entity;

use App\Repository\ComposantRepository;
use Doctrine\ORM\Mapping as ORM;

class Composant
{
    private ?string $nom;

    private ?string $denomination;

    private ?string $code_barre;

    public function __construct($nom,$denomination,$code_barre)
    {
        $this->setNom($nom);
        $this->setDenomination($denomination);
        $this->setCodeBarre($code_barre);
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination)
    {
        $this->denomination = $denomination;
    }

    public function getCodeBarre(): ?string
    {
        return $this->code_barre;
    }

    public function setCodeBarre(string $code_barre)
    {
        $this->code_barre = $code_barre;
    }

}
