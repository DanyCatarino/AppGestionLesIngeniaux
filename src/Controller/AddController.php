<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AtelierType;
use App\Entity\Atelier;
use Doctrine\ORM\EntityManagerInterface;

class AddController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function index()
    {
        return $this->render('add/index.html.twig', [
            'controller_name' => 'AddController',
        ]);
    }
    /**
     * @Route("/ajout",name="ajoutAtelier")
     */
    public function ajoutAtelier(Request $request,$atelier=null)
    {

        if($atelier == null){
            $atelier = new Atelier();
        }
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($atelier);
            $em->flush();
             return $this->redirectToRoute('afficheAtelier');
         }
        
        return $this->render('add/ajoutAtelier.html.twig', array(
            'form' => $form->createView(),
        ));
    
    }
    /**
     * @Route("/affiche",name="afficheAtelier")
     */
    public function afficheAtelier(){

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
