<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
}
