<?php

namespace App\Form;

use App\Entity\Atelier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AtelierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('public')
            ->add('descriptionCourte')
            ->add('theme')
            ->add('nbSeances')
            ->add('duree', TimeType::class, [
                'placeholder' => [
                    'hour' => 'Hour', 'minute' => 'Minute', 'second' => 'Second',
                ]
            ])
            ->add('statut',ChoiceType::class, [
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
                    if("Archiver" ===$choice){
                        return 'Archivé';
                    }
                    return strtoupper($key)
                ;}
                ])
            ->add('Type',ChoiceType::class, [
                'choices'=>[
                    'Ponctuel'=>"Ponctuel",
                    'Hebdomadaire'=>"Hebdomadaire",
                    'Stages vacances'=>"Stages vacances"
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Ponctuel" === $choice) {
                        return 'Ponctuel';
                    }
                    if("Hebdomadaire" === $choice){
                        return 'Hebdomadaire';
                    }
                    if("Stages vacances" === $choice){
                        return 'Stages vacances';
                    }
                    return strtoupper($key)
                ;}
                ])
            ->add('prix',MoneyType::class)
            ->add('descriptionLongue')
            ->add('photo', FileType::class)
            ->add('age')
            ->add('Ajouter',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Atelier::class,
        ]);
    }
}
