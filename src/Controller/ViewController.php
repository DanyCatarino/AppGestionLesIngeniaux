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
    public function listeInstances()
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

    /**
     * @Route("/listeAteliers",name="listeAteliers")
     */
    public function listeAteliers(){

        $atelier= $this->getDoctrine()->getRepository(Atelier::class)->findall(); //retourne toutes les ateliers dans la collection

         if(!$atelier){
             $message="Il n'y a aucun atelier  disponible"; //pas de atelier créer et affichage d'un message 
         }
         else{
             $message=null; //aucun message si il y'a une atelier
         }
        
        //redirection vers la page donnée
        return $this->render('view/atelier.html.twig',array('lesAteliers'=>$atelier,'message'=>$message));
    }
}
