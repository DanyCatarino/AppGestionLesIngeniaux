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
}
