<?php

namespace AppBundle\Form;

use AppBundle\Entity\Quiz\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class QuizQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        for ($i = 1; $i < 4; $i++) {

            $builder
                    ->add('question'.$i, TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response'.$i.'-1', CollectionType::class, array(
                            'data_class' => ResponseType::class,
                            'constraints' => array(
                                new NotBlank(),
                            )
                        ))
                                ->add('isValid'.$i.'-1', CheckboxType::class)

                        ->add('response'.$i.'-2', TextType::class, array(
                            'data_class' => ResponseType::class,
                            'constraints' => array(
                                new NotBlank(),
                            )
                        ))
                                ->add('isValid'.$i.'-2', CheckboxType::class)

                        ->add('response'.$i.'-3', TextType::class, array(
                            'data_class' => ResponseType::class,
                            'constraints' => array(
                                new NotBlank(),
                            )
                        ))
                        ->add('isValid'.$i.'-3', CheckboxType::class);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }
}
