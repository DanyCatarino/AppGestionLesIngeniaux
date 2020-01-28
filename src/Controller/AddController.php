<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\AnimateurType;
use App\Form\AtelierType;
use App\Form\InstanceType;
use App\Form\SalleType;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Canal;
use App\Form\CanalType;

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
        return $this->render('add/addInstance.html.twig', array('form'=>$form->createView()));
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

    /**
     * @Route("/addAnimateur", name="addAnimateur")
     */
    public function addAnimateur(Request $request, $animateur = null){
        if($animateur == null){
            $animateur = new Animateur();
        }
        $form = $this->createForm(AnimateurType::class, $animateur);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($animateur);
            $em->flush();
            return $this->redirectToRoute('listeAnimateurs');
        }
        return $this->render('add/addAnimateur.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/addSalle", name="addSalle")
     */
    public function addSalle(Request $request, $salle = null){
        if($salle == null){
            $salle = new Salle();
        }
        $form = $this->createForm(SalleType::class, $salle);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salle);
            $em->flush();
            return $this->redirectToRoute('listeSalles');
        }
        return $this->render('add/addSalle.html.twig', array('form'=>$form->createView()));
    }
    /**
     * @Route("/addContact",name="addContact")
     */
    public function addContact(Request $request,$contact=null)
    {
        if($contact == null)
        {
            $contact = new Contact();
        }
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('listeContacts');
        }
        return $this->render('add/addContact.html.twig',array(
            'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/addCanal", name="addCanal")
     */
    public function addCanal(Request $request,$canal=null)
    {
        if($canal==null)
        {
            $canal = new Canal();
        }
        $form = $this->createForm(CanalType::class,$canal);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($canal);
            $em->flush();
            return $this->redirectToRoute('listeCanaux');
        }
    return $this->render('add/addCanal.html.twig',array(
        'form' => $form->createView(),
    ));
    }
}
