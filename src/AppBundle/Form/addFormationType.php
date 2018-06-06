<?php

namespace AppBundle\Form;

use AppBundle\Entity\Formation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('description', TextType::class, array(
                'constraints' => array(
                    new NotBlank()
                )
            ))
            //->add('tags', addFormationTagType::class)
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
                    new NotBlank()
                )
            ))
            ->add('created_at', HiddenType::class, array(
                'data' => new \DateTime()
            ))
            ->add('author_id', HiddenType::class, array(
                'data'=> get_current_user()
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Formation::class,
        ));
    }
}