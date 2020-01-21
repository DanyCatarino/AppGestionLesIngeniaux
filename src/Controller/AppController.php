<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Atelier;
use Doctrine\ORM\EntityManagerInterface;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
    /**
     * @Route("/ajoutAtelier",name="app_ajout")
     */
    public function ajoutAtelier(EntityManagerInterface $manager)
    {
        $atelier1 = new atelier();

        $atelier1->setDescription("Modelisation/Impression 3D")
        ->setStatut("En Cours")
        ->setType("Trimestriel hebdo")
        ->setPrix(195);
        
        $manager->persist($atelier1);
        $manager->flush();
        return $this->render('atelier/index.html.twig',['controller_name'=>'AppController',
        
        ]);
    }
}
