<?php

namespace AppBundle\Form;

use AppBundle\Entity\Quiz\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuizType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->add('questions', CollectionType::class, array(
                    'entry_type' => QuizQuestionType::class,
                ));
    }

}