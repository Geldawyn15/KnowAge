<?php

namespace AppBundle\Form;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\addFormationType;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Formation;

class addFormationTagType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('tags' ,EntityType::class, array(
            'class'  => 'AppBundle:Tag',));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
        ));
    }
}