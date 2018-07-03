<?php

namespace AppBundle\Form;

use AppBundle\Entity\Quiz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class QuizQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question1', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('answer1_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response1_1', CheckboxType::class)

                    ->add('answer1_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response1_2', CheckboxType::class)

                    ->add('answer1_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response1_3', CheckboxType::class)



            ->add('question2', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('answer2_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response2_1', CheckboxType::class)

                    ->add('answer2_2', TextType::class, array(
                                'constraints' => array(
                                    new NotBlank(),
                                )
                            ))
                        ->add('response2_2', CheckboxType::class)

                    ->add('answer2_3', TextType::class, array(
                                'constraints' => array(
                                    new NotBlank(),
                                )
                            ))
                        ->add('response2_3', CheckboxType::class)


            ->add('question3', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('answer3_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response3_1', CheckboxType::class)

                    ->add('answer3_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response3_2', CheckboxType::class)

                    ->add('answer3_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                            )
                    ))
                        ->add('response3_3', CheckboxType::class)



            ->add('question4', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('answer4_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response4_1', CheckboxType::class)

                    ->add('answer4_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response4_2', CheckboxType::class)

                    ->add('answer4_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response4_3', CheckboxType::class)



            ->add('question5', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('answer5_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response5_1', CheckboxType::class)

                    ->add('answer5_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response5_2', CheckboxType::class)

                    ->add('answer5_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                        ->add('response5_3', CheckboxType::class);


    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Quiz::class,
        ));    }
}
