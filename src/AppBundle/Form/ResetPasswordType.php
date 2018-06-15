<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 13/06/18
 * Time: 16:10
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;



class ResetPasswordType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                    'first_options'  => array('label' => 'Nouveau mot de passe'),
                'second_options' => array('label' => 'Répétez le mot de passe'),
            ))
        ;

    }

}