<?php

namespace App\Controller;

use App\Entity\Camion;
use App\Entity\Categorie;
use App\Entity\Composant;
use App\Entity\Concession;
use App\Entity\Moto;
use App\Entity\Voiture;
use App\Repository\ComposantORMRepository;
use App\Repository\VehiculeORMRepository;
use App\Repository\CamionORMRepository;
use App\Repository\CategorieORMRepository;
use App\Repository\MotoORMRepository;
use App\Repository\VoitureORMRepository;
use App\Repository\ConcessionORMRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcessionnaireController extends AbstractController
{
    #[Route('/', name: 'app_concessionnaire')]
    public function index(
        CamionORMRepository $camionORM,
        CategorieORMRepository $cateORM,
        ComposantORMRepository $compoORM,
        MotoORMRepository $motoORM,
        VehiculeORMRepository $vehiculeORM,
        VoitureORMRepository $voitureORM,
        ConcessionORMRepository $concessionsORM,
        ): Response
    {
        $camionORM = $camionORM->findAll();
        $cateORM = $cateORM->findAll();
        $compoORM = $compoORM->findAll();
        $motoORM = $motoORM->findAll();
        $vehiculeORM = $vehiculeORM->findAll();
        $voitureORM = $voitureORM->findAll();
        $concessionsORM = $concessionsORM->findAll();


        $suv = new Categorie("SUV");
        $citadine = new Categorie("Citadine");
        $berline = new Categorie("berline");

        $composant1 = new Composant("compo1","1CD","111111");
        $composant2 = new Composant("compo2","2RF","123456");
        $composant3 = new Composant("compo3","3D4","111111");

        $listeComposant1 = [$composant1,$composant2]; 
        $listeComposant2 = [$composant2,$composant3];

        $voit1 = new Voiture("Audi","A3",$listeComposant2,5,$suv,5.63);
        $voit2 = new Voiture("BMW","C6",$listeComposant1,5,$citadine,65.3);
        $moto1 = new Moto("moto1","gammeMoto1",$listeComposant2,5,$citadine,250);
        $moto2 = new Moto("moto2","gammeMoto2",$listeComposant2,5,$berline,300);
        $camion1 = new Camion("camion1","gammeCamion1",$listeComposant1,5,$berline,2);
        $camion2 = new Camion("camion2","gammeCamion2",$listeComposant2,5,$suv,3);

        $liste_vehicule1 = [$voit1,$moto1,$camion2];
        $liste_vehicule2 = [$voit2,$moto2,$camion1];

        $concession1 = new Concession("concess1","rue ici","Lyon","69000",$liste_vehicule1);
        $concession2 = new Concession("concess2","rue laba","Paris","75000",$liste_vehicule2);

        $concessions = [$concession1,$concession2];

        // $vehicules = [$motoORM,$voitureORM,$camionORM];

        return $this->render('concessionnaire/index.html.twig',[
            'concessions' => $concessions,
            'concessionsORM' => $concessionsORM,
        ]);
    }
}
