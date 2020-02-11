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
use App\Entity\Inscrit;
use App\Form\InscritType;
use App\Form\InstanceType;
use App\Repository\InscritRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type as SFType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
//ini_set('display_errors', 'on'); 
class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('inscrit',TextType::class, array(
                'attr' => array('readonly'=>true,'empty_data'=>'3'),))
            ->add('instance')
            ->add('canal',EntityType::class,[
                'class'=>Canal::class,
                'choice_label'=>'nomCanal',
            ])
            ->add('paye',CheckboxType::class, array('required' => false))
            ->add('Enregistrer',SFType\SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
