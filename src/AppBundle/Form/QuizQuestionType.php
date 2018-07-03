<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
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
                    ->add('reponse1_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse1_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse1_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))

            ->add('question2', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('reponse2_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse2_2', TextType::class, array(
                                'constraints' => array(
                                    new NotBlank(),
                                )
                            ))
                    ->add('reponse2_3', TextType::class, array(
                                'constraints' => array(
                                    new NotBlank(),
                                )
                            ))
            ->add('question3', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('reponse3_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse3_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse3_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
            ->add('question4', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('reponse4_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse4_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse4_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
            ->add('question5', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
                    ->add('reponse5_1', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse5_2', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ))
                    ->add('reponse5_3', TextType::class, array(
                        'constraints' => array(
                            new NotBlank(),
                        )
                    ));

    }
}
