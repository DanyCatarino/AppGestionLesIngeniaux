<?php

namespace App\Form;
use App\Entity\Inscription;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use App\Form\CanalType;
use App\Entity\Canal;
use App\Entity\Atelier;
use App\Entity\Instance;
use App\Entity\Inscrit;
use App\Form\InscritType;
use App\Form\InstanceType;
use App\Repository\InstanceRepository;
use App\Repository\InscritRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type as SFType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\Query\Expr\Join;

//ini_set('display_errors', 'on'); 
class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('inscrit',TextType::class, array(
                'attr' => array('readonly'=>true)))
            ->add('instance', EntityType::class, [
                'class' => Instance::class,
                'placeholder' => "Selectionner l'instance",
            ])
            ->add('instance', EntityType::class, [
                'class' => Instance::class,
                'placeholder' => "Selectionner l'instance",
                'choice_label' => 'atelier.titre',
                'label' => 'Instance',
            ])
            ->add('canal',EntityType::class,[
                'class'=>Canal::class,
                'choice_label'=>'nomCanal',
            ])
            ->add('paye',CheckboxType::class, array('required' => false))
            ->add('Enregistrer',SFType\SubmitType::class,[
            'attr' => [
                'class' => 'btn btn-primary btn-block',
            ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
