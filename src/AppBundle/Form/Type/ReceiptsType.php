<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Receipts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceiptsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('Type_dishes', EntityType::class, array(
                'class' => 'AppBundle:Type_dishes',
                'choice_label' => 'Type_dishes',
            ))
            ->add('is_veg', ChoiceType::class, array(
                'expanded' => true,
                'label' => 'Végétarien',
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                )))
            ->add('name_ingredient', TextType::class)
            ->add('qte_ingredient', TextType::class)
        ;

    }

    public function getName()
    {
        return 'Receipts';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Receipts::class,
        ));
    }
}