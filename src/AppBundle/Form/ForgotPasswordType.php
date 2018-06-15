<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 13/06/18
 * Time: 16:10
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;



class ForgotPasswordType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ));
    }

}