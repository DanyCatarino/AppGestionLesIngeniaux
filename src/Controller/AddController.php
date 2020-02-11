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
use App\Entity\Age;
use App\Entity\Inscrit;
use App\Form\InscritType;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use Symfony\Component\Form\FormInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
    /**
     * @Route("/addInscrit",name="addInscrit") 
     */
    public function addInscrit(Request $request,Inscrit $inscrit=null)
    {
        if(!$inscrit)
        {
            $inscrit = new Inscrit();
        }
        $form = $this->createForm(InscritType::class,$inscrit);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($inscrit);
            $em->flush();
            return $this->redirectToRoute('addInscription', array('id' => $inscrit->getId()));
        }
    return $this->render('add/addInscrit.html.twig',array(
        'form' => $form->createView(),
        'id' => $inscrit->getId())
    );
    }
    /**
     * @Route("/addInscription/{id}",name="addInscription")
     */
    public function addInscription(Request $request,Inscription $inscription=null,Inscrit $inscrit,$id){
        $inscription= new Inscription();

        $form=$this->createForm(InscriptionType::class,$inscription);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())                        
            {  
                $inscrit= new Inscrit();
                $inscrit=$this->getDoctrine()->getRepository(Inscrit::class)->find($id);
                $em=$this->getDoctrine()->getManager();
                $inscription->getInscrit($inscrit);
                $em->persist($inscription);
                $em->flush();
            }
                return $this->render('add/addInscription.html.twig',array('form'=>$form->createView(),'inscription'=>$inscription->getInscrit($inscrit),'inscrit'=>$inscrit->getInscription($inscription)));
    }
}
