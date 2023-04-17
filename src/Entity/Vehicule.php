<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

class Vehicule
{
    private ?string $marque;

    private ?string $gamme;

    private array $composant;

    private ?int $nbrPlace;

    private ?object $categorie;

    public function __construct($marque,$gamme,$composant,$nbrPlace,$categorie)
    {
        $this->setMarque($marque);
        $this->setGamme($gamme);
        $this->setComposant($composant);
        $this->setNbrPlace($nbrPlace);
        $this->setCategorie($categorie);
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque)
    {
        $this->marque = $marque;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme)
    {
        $this->gamme = $gamme;
    }

    public function getComposant(): array
    {
        return $this->composant;
    }

    public function setComposant(array $composant)
    {
        $this->composant = $composant;
    }

    public function getNbrPlace(): ?int
    {
        return $this->nbrPlace;
    }

    public function setNbrPlace(int $nbrPlace)
    {
        $this->nbrPlace = $nbrPlace;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }
}
