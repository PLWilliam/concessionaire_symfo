<?php

namespace App\Entity;

use App\Repository\ConcessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
class Concession
{
    private ?string $nom;

    private ?string $rue;

    private ?string $ville;

    private ?string $code_postal;

    private array $liste_vehicule;

    public function __construct($nom,$rue,$ville,$code_postal,$liste_vehicule)
    {
        $this->setNom($nom);
        $this->setRue($rue);
        $this->setVille($ville);
        $this->setCodePostal($code_postal);
        $this->setListeVehicule($liste_vehicule);
    } 

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue)
    {
        $this->rue = $rue;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville)
    {
        $this->ville = $ville;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal)
    {
        $this->code_postal = $code_postal;
    }

    public function getListeVehicule(): array
    {
        return $this->liste_vehicule;
    }

    public function setListeVehicule(array $liste_vehicule)
    {
        $this->liste_vehicule = $liste_vehicule;
    }
}
