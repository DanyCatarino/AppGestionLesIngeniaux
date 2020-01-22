<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AtelierType;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\InstanceType;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;

class AddController extends AbstractController
{
    /**
     * @Route("/addInstance", name="addInstance")
     */
    public function addInstance(Request $request, $instance = null){
        if($instance == null){
            $instance = new Instance();
        }
        $form = $this->createForm(InstanceType::class, $instance);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instance);
            $em->flush();
            return $this->redirectToRoute('listeInstances');
        }
        return $this->render('add/addInstances.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/addAtelier",name="addAtelier")
     */
    public function addAtelier(Request $request,$atelier=null)
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
             return $this->redirectToRoute('listeAteliers');
         }
        
        return $this->render('add/addAtelier.html.twig', array(
            'form' => $form->createView(),
        ));
    
    }
}
