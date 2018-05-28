<?php

namespace AppBundle\Form;

use AppBundle\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class addFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('tags', TextType::class)
            ->add('categories', ChoiceType::class, array(
                'choices'  => array(
                    'Sport' => 'sport',
                    'Cuisine' => 'Cuisine',
                    'Life Style' => 'Life Style',
                )))
            ->add('price',ChoiceType::class, array(
                'choices'  => array(
                    '15 Euros' => '15 Euros',
                    '30 Euros' => '30 Euros',
                    '40 Euros' => '40 Euros',
                )))
            ->add('picture', FileType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
        ));
    }




}