<?php

namespace App\Form;

use App\Entity\Inscrit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type as SFType;
use App\Entity\Contact;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
class InscritType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',)
            ->add('prenom',TextType::class)
            ->add('mail',TextType::class)
            ->add('telephone',TextType::class)  
            ->add('contact',EntityType::class,[
                'class' => Contact::class,
                'choice_label' => 'nom',
            ])
            ->add('dateNaissance',BirthdayType::class)
            ->add('Enregistrer',SFType\SubmitType::class)   
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscrit::class,
        ]);
    }
}
