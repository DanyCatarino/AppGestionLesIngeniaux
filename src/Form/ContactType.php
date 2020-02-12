<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail',EmailType::class,['help'=>'Entrez une adresse@mail',])
            ->add('telephone',TelType::class)
            ->add('Notes',TextType::class)
            ->add('Provenance',ChoiceType::class, [
                'choices'=>[
                    'Visite Boutique'=>"Visite Boutique",
                    'Formulaire Contact site '=>"Formulaire Contact Site",
                    'Commande sur Site'=>"Commande sur Site",
                    'Appel Téléphonique'=>"Appel téléphonique",
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Visite Boutique" === $choice) {
                        return 'Visite Boutique';
                    }
                    if("Formulaire Contact Site" ===$choice){
                        return 'Formulaire Contact Site';
                    }
                    if("Commande sur Site" ===$choice){
                        return 'Commande sur Site';
                    }
                    if("Appel téléphonique" ===$choice){
                        return 'Appel Téléphonique';
                    } 
                    return strtoupper($key)
                ;}
                ])
            ->add('Segment',ChoiceType::class, [
                'choices'=>[
                    'Partenaire/Animateur'=>"Partenaire/Animateur",
                    'Elève/Adulte'=>"Elève/Adulte",
                    'Parent/Elève/Enfant'=>"Parent/Elève/Enfant"
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Partenaire/Animateur" === $choice) {
                        return 'Partenaire/Animateur';
                    }
                    if("Elève/Adulte" ===$choice){
                        return 'Elève/Adulte';
                    }
                    if("Parent/Elève/Enfant" ===$choice){
                        return 'Parent/Elève/Enfant';
                    }
                    return strtoupper($key)
                ;}
                ])
            ->add('Creer Contact',SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary btn-block',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
