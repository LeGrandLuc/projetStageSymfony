<?php

namespace App\Controller;

use App\Entity\Joueur;
use App\Entity\Logo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use App\Entity\Saison;
use App\Entity\Club;
use App\Entity\Joue;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        //On appelle certaines listes dans le bdd
        $entityManager = $this->getDoctrine()->getManager();

           $joueur1 = new Joueur("Jean","Valjean");
           $logo1 = new Logo(new \DateTime("2018-05-01 00:00:00"), new \DateTime("2078-05-01 00:00:00"));
           $saison1 = new Saison(new \DateTime("2018-05-01 00:00:00"), new \DateTime("2078-05-01 00:00:00"));
           $club1 = new Club("Club des 5",1);
           $joue= new Joue(5,1,$joueur1, $saison1, $club1);
           $joueur1->setJoue($joue);
           $club1->setJoue($joue);
           $saison1->setJoue($joue);

        $entityManager->persist($joueur1);
        $entityManager->flush();
        $entityManager->persist($club1);
        $entityManager->flush();
        $entityManager->persist($saison1);
        $entityManager->flush();
        $entityManager->persist($logo1);
        $entityManager->flush();
        $entityManager->persist($joue);
        $entityManager->flush();


    

         $joueur1 = $this->getDoctrine()
        ->getRepository(Joueur::class)
        ->findAll();

        $logo1 = $this->getDoctrine()
        ->getRepository(Joueur::class)
        ->findAll();

        $club1 = $this->getDoctrine()
        ->getRepository(Club::class)
        ->findAll();

        $saison1 = $this->getDoctrine()
        ->getRepository(Saison::class)
        ->findAll();

        $joue = $this->getDoctrine()
        ->getRepository(Joue::class)
        ->findAll();

        dd($joue);

        
    

        

    return $this->render('accueil/index.html.twig');
    }
}
