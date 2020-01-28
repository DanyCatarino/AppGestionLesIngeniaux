<?php

namespace App\Form;

use App\Entity\Atelier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class AtelierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('statut',ChoiceType::class, [
                'choices'=>[
                    'Disponible'=>"Disponible",
                    'Brouillion'=>"Brouillon",
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
            ->add('type',ChoiceType::class,[
                    'choices'=>[
                            'Atelier Hebomadaire'=>"Atelier Hebdomadaire",
                            'Atelier Ponctuel'=>"Atelier Ponctuel",
                            'Stages Vacances'=>"Stages Vacances"
                    ],
                    'choice_label'=> function($choice, $key,$value)
                    {
                        if ("Atelier Hebdomadaire" === $choice) {
                            return 'Atelier Hebdomadaire';
                        }
                        if("Atelier Ponctuel" === $choice){
                            return 'Atelier Ponctuel';
                        }
                        if("Stages Vacances" === $choice){
                            return 'Stages Vacances';
                        }
                        return strtoupper($key)
                    ;}
                ])   
            ->add('prix',MoneyType::class)
            ->add('public')
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
