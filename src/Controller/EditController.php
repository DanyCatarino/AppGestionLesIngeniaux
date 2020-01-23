<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;  
use App\Entity\Atelier;
use App\Form\AtelierType;
use App\Entity\Instance;
use App\Form\InstanceType;
use App\Entity\Contact;
use App\Form\ContactType;
class EditController extends AbstractController
{
    /**
     * @Route("/edit", name="edit")
     */
    public function index()
    {
        return $this->render('edit/index.html.twig', [
            'controller_name' => 'EditController',
        ]);
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
}