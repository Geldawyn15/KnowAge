<?php

namespace AppBundle\Form;

use AppBundle\Entity\Quiz\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class QuizQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

            $builder
                    ->add('content', TextType::class, ['required' => false, 'label' => 'Questions :'])
                    ->add('responses', CollectionType::class, array(
                        'entry_type' => ResponseType::class,
                    ));

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }
}
