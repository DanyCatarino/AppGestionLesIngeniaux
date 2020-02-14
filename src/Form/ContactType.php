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
            ->add('mail',EmailType::class)
            ->add('telephone',TelType::class)
            ->add('notes',TextType::class)
            ->add('provenance',ChoiceType::class, [
                'choices'=>[
                    'Visite boutique'=>"Visite boutique",
                    'Formulaire contact site '=>"Formulaire contact site",
                    'Commande sur site'=>"Commande sur site",
                    'Appel téléphonique'=>"Appel téléphonique",
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Visite boutique" === $choice) {
                        return 'Visite boutique';
                    }
                    if("Formulaire contact site" ===$choice){
                        return 'Formulaire contact site';
                    }
                    if("Commande sur site" ===$choice){
                        return 'Commande sur site';
                    }
                    if("Appel téléphonique" ===$choice){
                        return 'Appel téléphonique';
                    } 
                    return strtoupper($key)
                ;}
                ])
            ->add('segment',ChoiceType::class, [
                'choices'=>[
                    'Partenaire-Animateur'=>"Partenaire-Animateur",
                    'Elève-Adulte'=>"Elève-Adulte",
                    'Parent-Elève-Enfant'=>"Parent-Elève-Enfant"
                ],
                'choice_label' => function ($choice, $key, $value) 
                {
                    if ("Partenaire-Animateur" === $choice) {
                        return 'Partenaire-Animateur';
                    }
                    if("Elève-Adulte" ===$choice){
                        return 'Elève-Adulte';
                    }
                    if("Parent-Elève-Enfant" ===$choice){
                        return 'Parent-Elève-Enfant';
                    }
                    return strtoupper($key)
                ;}
                ])
            ->add('Ajouter le contact', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary btn-block'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
