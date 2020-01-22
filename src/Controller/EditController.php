<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;  
use App\Entity\Atelier;
use App\Entity\AtelierType;
use App\Entity\Instance;
use App\Entity\InstanceType;
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
}