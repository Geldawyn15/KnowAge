<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 13/06/18
 * Time: 16:10
 */

namespace blackknight467\StarRatingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;



class RatingFormationType extends abstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rating', RatingType::class, ['label' =>'Rating'
        ]);
    }
}