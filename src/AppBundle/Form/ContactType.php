<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('firstname', TextType::class, array(
                'label' => 'Prénom',
                'constraints' => array(
                    new NotBlank(),
            )))
            ->add('name', TextType::class, array(
                'label' => 'Nom',
                'constraints' => array(
                new NotBlank(),
            )))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
                'constraints' => array(
                    new NotBlank(),
                )))
            ->add('message', TextareaType::class, array(
                'attr' => array('cols' => '5', 'rows' => '4'),
                'constraints' => array(
                    new NotBlank(),
            )));
    }
}

