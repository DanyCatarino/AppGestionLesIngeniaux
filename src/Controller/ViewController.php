<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;
use Twig\Extra\Intl\IntlExtension;
use App\Entity\Contact;
use App\Entity\Canal;

class ViewController extends AbstractController
{

   /**
    * @Route("/listeInstances", name="listeInstances")
    */
    public function listeInstances()
    {
        $instance = $this->getDoctrine()->getRepository(Instance::class)->findByDispoBrouillonInstance();
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

        $atelier= $this->getDoctrine()->getRepository(Atelier::class)->findByDispoBrouillonAtelier(); //retourne toutes les ateliers dans la collection

         if(!$atelier){
             $message="Il n'y a aucun atelier  disponible"; //pas de atelier créer et affichage d'un message 
         }
         else{
             $message=null; //aucun message si il y'a une atelier
         }
        
        //redirection vers la page donnée
        return $this->render('view/viewAteliers.html.twig',array('lesAteliers'=>$atelier,'message'=>$message));
    }

    /**
    * @Route("/listeAnimateurs", name="listeAnimateurs")
    */
    public function listeAnimateurs()
    {
        $animateur = $this->getDoctrine()->getRepository(Animateur::class)->findall();
        if(!$animateur){
            $message="Pas d'instances !";
        }
        else{
            $message = null;
        }
       
        return $this->render('view/viewAnimateurs.html.twig', array('allAnimateurs'=>$animateur,'message'=>$message));
    }

    /**
    * @Route("/listeSalles", name="listeSalles")
    */
    public function listeSalles()
    {
        $salle = $this->getDoctrine()->getRepository(Salle::class)->findall();
        if(!$salle){
            $message="Pas d'instances !";
        }
        else{
            $message = null;
        }
       
        return $this->render('view/viewSalles.html.twig', array('allSalles'=>$salle,'message'=>$message));
    }
    /**
     * @Route("/listeContacts",name="listeContacts")
     */
    public function listeContacts()
    {
        $contact=$this->getDoctrine()->getRepository(Contact::class)->findAll();

        if(!$contact)
        {
            $message2="Il n'y aucun contact inscrit";
        }
        else
        {
            $message2=null;
        }
        return $this->render('view/viewContacts.html.twig',array('lesContacts'=>$contact,'message'=>$message2));
    }
    /**
     * @Route("/listeCanaux",name="listeCanaux")
     */
    public function listeCanaux()
    {
        $canal=$this->getDoctrine()->getRepository(Canal::class)->findAll();

        if(!$canal)
        {
            $message2="Il n'y aucun contact inscrit";
        }
        else
        {
            $message2=null;
        }
        return $this->render('view/viewCanaux.html.twig',array('lesCanaux'=>$canal,'message'=>$message2));
    }
}
