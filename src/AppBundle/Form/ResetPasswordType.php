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



class ResetPasswordType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('newPassword', PasswordType::class);
    }

}