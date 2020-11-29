<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\PersonalInfoDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class PersonalInfoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])->add('familyName', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('dateBirth', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', PersonalInfoDTO::class);
        $resolver->setDefaults([
            'data_class' => PersonalInfoDTO::class,
            'allow_extra_fields' => false,
        ]);
    }
}