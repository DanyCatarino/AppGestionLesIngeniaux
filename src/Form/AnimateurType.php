<?php

namespace App\Form;

use App\Entity\Animateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as SFType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AnimateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom',TextType::class)
            ->add('emailContact',TextType::class)
            ->add('telephone',TelType::class)
            ->add('documentationDisponible',ChoiceType::class,[
                'choices'=>[
                    'Assurance'=>"Assurance",
                    'Contrat'=>"Contrat"
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Assurance" === $choice) {
                        return 'Assurance';
                    }
                    if("Contrat" ===$choice){
                        return 'Contrat';
                    }
                    return strtoupper($key)
                ;}
                ])
            ->add('Ajouter',SFType\SubmitType::class,
                [
                'attr' => [
                    'class' => 'btn btn-primary btn-block',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Animateur::class,
        ]);
    }
}
