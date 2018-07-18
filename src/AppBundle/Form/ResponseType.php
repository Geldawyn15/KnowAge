<?php

namespace AppBundle\Form;

use AppBundle\Entity\Quiz\Response;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ResponseType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextType::class, ['required' => false, 'label' => 'Réponse :'])
            ->add('isValid', CheckboxType::class, ['required' => false, 'label' => 'Bonne réponse ?']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Response::class,
        ));
    }

}