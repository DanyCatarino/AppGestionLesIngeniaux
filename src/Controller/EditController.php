<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\InstanceType;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Form\SalleType;
use App\Entity\Animateur;
use App\Form\AnimateurType;
use App\Form\AtelierType;
use App\Entity\Contact;
use App\Form\ContactType;

class EditController extends AbstractController
{
    /**
     * @Route("/delInstance/{id}", name="delInstance")
     */
    public function delInstance($id, EntityManagerInterface $em)
    {
        $instance = $this->getDoctrine()->getRepository(Instance::class)->find($id);
        $em->remove($instance);
        $em->flush();
        return $this->redirectToRoute('listeInstances');
    }

    /**
     * @Route("/delAnimateur/{id}", name="delAnimateur")
     */
    public function delAnimateur($id, EntityManagerInterface $em)
    {
        $animateur = $this->getDoctrine()->getRepository(Animateur::class)->find($id);
        $em->remove($animateur);
        $em->flush();
        return $this->redirectToRoute('listeAnimateurs');
    }

    /**
     * @Route("/delSalle/{id}", name="delSalle")
     */
    public function delSalle($id, EntityManagerInterface $em)
    {
        $salle = $this->getDoctrine()->getRepository(Salle::class)->find($id);
        $em->remove($salle);
        $em->flush();
        return $this->redirectToRoute('listeSalles');
    }
    /**
     * @Route("/delAtelier/{id}", name="delAtelier")
     */
    public function deleteAtelier($id,EntityManagerInterface $em){
        $atelier=$this->getDoctrine()->getRepository(Atelier::class)->find($id);
        $em->remove($atelier);
        $em->flush(); 
        return $this->redirectToRoute('listeAteliers');
    }
    
    /**
     * @Route("/delContact/{id}", name="delContact")
     */
    public function deleteContact($id,EntityManagerInterface $em){
        $contact=$this->getDoctrine()->getRepository(Contact::class)->find($id);
        $em->remove($contact);
        $em->flush();
        return $this->redirectToRoute('listeContacts');

    }

    /**
     * @Route("/delCanal/{id}", name="delCanal")
     */
    public function deleteCanal($id,EntityManagerInterface $em){
        $canal=$this->getDoctrine()->getRepository(Canal::class)->find($id);
        $em->remove($canal);
        $em->flush();
        return $this->redirectToRoute('listeCanaux');

        }
    /**
    * @Route("/editAtelier/{id}", name="editAtelier")
    */
        public function editAtelier(Request $request,Atelier $atelier,$id)
        {
        if($atelier!=null)
        {
            $atelier=$this->getDoctrine()->getRepository(Atelier::Class)->find($id);
        }
            $form=$this->createForm(AtelierType::class,$atelier);
            $form->handleRequest($request);

            if($form->isSubmitted()&& $form->isValid())                        
            {  
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('listeAteliers');
            }
            return $this->render('edit/modifAtelier.html.twig',array('form'=>$form->createView(),'atelier'=>$atelier->getId()));
        }
        /**
        * @Route("/editInstance/{id}", name="editInstance")
        */
        public function editInstance(Request $request,Instance $instance,$id)
        {
            if($instance!=null)
            {
                $instance=$this->getDoctrine()->getRepository(Instance::Class)->find($id);
            }
                $form=$this->createForm(InstanceType::class,$instance);
                $form->handleRequest($request);

                    if($form->isSubmitted()&& $form->isValid())                        
                    {  
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        return $this->redirectToRoute('listeInstances');
                    }
            return $this->render('edit/modifInstance.html.twig',array('form'=>$form->createView(),'instance'=>$instance->getId()));
        }
         /**
        * @Route("/editContact/{id}", name="editContact")
        */
        public function editContact(Request $request,Contact $contact,$id)
        {
            if($contact!=null)
            {
                $contact=$this->getDoctrine()->getRepository(Contact::Class)->find($id);
            }
                $form=$this->createForm(ContactType::class,$contact);
                $form->handleRequest($request);

                    if($form->isSubmitted()&& $form->isValid())                        
                    {  
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        return $this->redirectToRoute('listeContacts');
                    }
            return $this->render('edit/modifContact.html.twig',array('form'=>$form->createView(),'contact'=>$contact->getId()));
        }
        /**
        * @Route("/editAnimateur/{id}", name="editAnimateur")
        */
        public function editAnimateur(Request $request,Animateur $animateur,$id)
        {
            if($animateur!=null)
            {
                $animateur=$this->getDoctrine()->getRepository(Animateur::Class)->find($id);
            }

                $form=$this->createForm(AnimateurType::class,$animateur);
                $form->handleRequest($request);

                    if($form->isSubmitted()&& $form->isValid())                        
                    {  
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        return $this->redirectToRoute('listeAnimateurs');
                    }
            return $this->render('edit/modifAnimateur.html.twig',array('form'=>$form->createView(),'animateur'=>$animateur->getId()));
        }
         /**
        * @Route("/editSalle/{id}", name="editSalle")
        */
        public function editSalle(Request $request,Salle $salle,$id)
        {
            if($salle!=null)
            {
                $salle=$this->getDoctrine()->getRepository(Salle::Class)->find($id);
            }

                $form=$this->createForm(SalleType::class,$salle);
                $form->handleRequest($request);

                    if($form->isSubmitted() && $form->isValid())                        
                    {  
                        $em = $this->getDoctrine()->getManager();
                        $em->flush();
                        return $this->redirectToRoute('listeSalles');
                    }
            return $this->render('edit/modifSalle.html.twig',array('form'=>$form->createView(),'Salle'=>$salle->getId()));
        }
}
