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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;



class SignalFormationType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('POST')
            ->add('message', TextareaType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))

            ->add('choices',ChoiceType::class, array(
                'choices'  => array(
                    'Propos diffamatoires ou injurieux' => 'Propos diffamatoires ou injurieux',
                    'Incitation à la haine raciale' => 'Incitation à la haine raciale',
                    'Contenu douteux' => 'Contenu douteux'),
                'constraints' => array(
                    new NotBlank()
                )
            ));
    }


}