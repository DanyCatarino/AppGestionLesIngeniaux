<?php

namespace App\Form;

use App\Entity\Seance;
use App\Entity\Atelier;
use App\Entity\Salle;
use App\Form\InstanceType;
use App\Form\SalleType;
use App\Repository\SalleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type as SFType;

class SeanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class,[
                'widget' => 'single_text'
            ])
            ->add('salle', EntityType::class, [
                'class' => Salle::class,
                'placeholder' => "Selectionner la salle",
                'choice_label' => 'nomSalle',
                'label' => 'Salle',
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
            'data_class' => Seance::class,
        ]);
    }
}
