<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\InstanceType;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;

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
}

use App\Form\AtelierType;
use App\Entity\Contact;
use App\Form\ContactType;
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
}