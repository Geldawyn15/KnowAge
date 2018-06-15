<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use AppBundle\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;



class FormationType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('content', CKEditorType::class, array(
            'config' => array(
                'uiColor' => '#ffffff',

                //...switch the toolbar configuration by using the full, standard or basic
                'toolbar' => 'standard'

            ),
        ));



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
        ));

    }

}