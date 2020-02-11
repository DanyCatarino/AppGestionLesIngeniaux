<?php

namespace App\Form;

use App\Form\AtelierType;
use App\Form\SeanceType;
use App\Entity\Instance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Entity\Animateur;
use App\Entity\Seance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\AtelierRepository;
use App\Repository\SalleRepository;
use App\Repository\AnimateurRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type as SFType;

class InstanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('atelier', EntityType::class, [
                'class' => Atelier::class,
                'placeholde:r' => "Selectionner l'atelier",
                'query_builder' => function (AtelierRepository $qb)
                {
                    return $qb->createQueryBuilder('a')->orderBy('a.titre', 'ASC');
                },
                'choice_label' => function(Atelier $atelier)
                {
                    return ($atelier->getTitre());
                },
                'label' => 'Atelier',
                'required' => true
            ])
            ->add('statut',ChoiceType::class, [
                'placeholder' => "Sélectionner le statut",
                'choices'=>[
                    'Disponible'=>"Disponible",
                    'Brouillon'=>"Brouillon",
                    'Archivé'=>"Archivé"
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Disponible" === $choice) {
                        return 'Disponible';
                    }
                    if("Brouillon" ===$choice){
                        return 'Brouillon';
                    }
                    if("Archivé" ===$choice){
                        return 'Archivé';
                    }
                    return strtoupper($key)
                ;}
            ])
            ->add('animateur', EntityType::class, [
                'class' => Animateur::class,
                'placeholder' => "Selectionner l'animateur",
                'query_builder' => function (AnimateurRepository $qb)
                {
                    return $qb->createQueryBuilder('a')->orderBy('a.nom', 'ASC');
                },
                'choice_label' => function(Animateur $animateur)
                {
                    return ($animateur->getNom());
                },
                'label' => 'Animateur',
                'required' => true
            ])
            ->add('Ajouter',SFType\SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary btn-block'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Instance::class,
        ]);
    }
}
