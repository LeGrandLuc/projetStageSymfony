<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\Common\Collections\ArrayCollection;


use App\Entity\Club;
use App\Entity\Logo;
use App\Entity\Joueur;
use App\Entity\Saison;
use App\Entity\Joue;


class JoueController extends AbstractController
{
    /**
     * @Route("/joue", name="joue")
     */
    public function index()
    {


           //$clubjeden = new Club("REALSTRASBOURG", new ArrayCollection([$logosacre]));


        //echo $logosacre->getDateFin();


        //echo var_dump($clubjeden);
        echo "coucou";

        return $this->render('joue/index.html.twig', [
            'controller_name' => 'JoueController',
        ]);
    }
}
