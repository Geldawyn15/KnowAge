<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;


class ContactTeacherType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('objet', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('message', TextareaType::class, array(
                'attr' => array('cols' => '2', 'rows' => '5'),
                'constraints' => array(
                    new NotBlank()
                )
            ));
    }
}