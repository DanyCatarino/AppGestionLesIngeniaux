<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;
use Twig\Extra\Intl\IntlExtension;

class ViewController extends AbstractController
{

   /**
    * @Route("/listeInstances", name="listeInstances")
    */
    public function listeInstance()
    {
        $instance = $this->getDoctrine()->getRepository(Instance::class)->findall();
        if(!$instance){
            $message="Pas d'instances !";
        }
        else{
            $message = null;
        }
       
        return $this->render('view/viewInstances.html.twig', array('allInstances'=>$instance,'message'=>$message));
    }
}
