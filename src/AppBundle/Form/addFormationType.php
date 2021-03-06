<?php

namespace AppBundle\Form;

use AppBundle\Entity\Formation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;


class addFormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                'rows' => '3',
                'cols' => '1',),
                'constraints' => array(
                    new NotBlank()
                )
            ))

            ->add('category' ,EntityType::class, array(
                'class'  => 'AppBundle:Category',
                'constraints'=> array(
                    new NotBlank()
                )
            ))
            ->add('price',ChoiceType::class, array(
                'choices'  => array(
                    '15 Euros' => '15',
                    '30 Euros' => '30',
                    '40 Euros' => '40'),
                'constraints' => array(
                    new NotBlank()
                )
            ))
            ->add('picture', FileType::class, array(
                'constraints' => array(
                    new NotBlank(['message' => 'Ce chanmp ne peut etre vide']),
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Le format de votre image est invalide. Merci de sélectionner une image au format : jpeg/jpg ou png.',
                    ])

                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
        ));
    }
}