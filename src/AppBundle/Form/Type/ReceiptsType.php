<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Ingredients;
use AppBundle\Entity\Receipts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                'choices' => array(
                    'Yes' => true,
                    'No' => false,
                )))
            ->add('levelId', ChoiceType::class, array(
                'label' => 'Difficulté',
                'choices' => array(
                    'Facile' => 0,
                    'Moyen' => 1,
                    'Difficile' => 2,
                )))
            ->add('priceTypeId', ChoiceType::class, array(
                'label' => 'Catégorie de prix',
                'choices' => array(
                    'Bon marché' => 0,
                    'Moyen' => 1,
                    'Assé cher' => 2,
                )))
            ->add('prepareTime', IntegerType::class)
            ->add('cookingTime', IntegerType::class)
            ->add('type_cooking', EntityType::class, array(
                'class' => 'AppBundle:Type_cooking',
                'choice_label' => 'Type_cooking',
            ))
            ->add('qte', TextType::class, array(
                'label' => 'Quantité',))
            ->add('ingredients', CollectionType::class, array(
                'entry_type' => IngredientsType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('stage', CollectionType::class, array(
                'entry_type' => StageType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'prototype' => true,
            ))
            ->add('drink', TextType::class)
            ->add('details', TextType::class);
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