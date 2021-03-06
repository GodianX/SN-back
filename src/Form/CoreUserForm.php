<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\CoreUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CoreUserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class, [
                'constraints' => new NotBlank(),
            ])->add('email', TextType::class, [
                'constraints' => new NotBlank(),
            ])
            ->add('personalInfo', PersonalInfoForm::class, [
                'constraints' => new NotBlank(),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CoreUserDTO::class,
            'allow_extra_fields' => false,
        ]);
    }
}