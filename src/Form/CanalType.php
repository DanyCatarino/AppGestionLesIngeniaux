<?php

namespace App\Form;

use App\Entity\Canal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
class CanalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomCanal',TextType::class)
            ->add('urlCanal',UrlType::class,['attr'=>['class'=>'UrlType']])
            ->add('Externe',CheckboxType::class,array('label'=>'Externe','required'=>false,))
            ->add('Direct',CheckboxType::class,array('label'=>'Direct','required'=>false,))
            ->add('comission',PercentType::class)
            ->add('NomDuContact',TextType::class)
            ->add('EmailDuContact',EmailType::class)
            ->add('Ajouter un Canal',SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary btn-block',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Canal::class,
        ]);
    }
}
