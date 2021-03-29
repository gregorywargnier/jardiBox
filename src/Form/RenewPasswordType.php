<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class RenewPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('old_password', PasswordType::class, [
                "label" => "Ecrivez votre ancien mot de passe",
                'attr' => [
                    'class' => "form-control mb-3",
                ],
                'mapped' => false,
                "constraints" => [
                    new SecurityAssert\UserPassword([
                        "message" => "Votre ancien mot de passe est incorrect",
                    ]),
                ],
            ])
            ->add("password", RepeatedType::class, [
                'label'=> false,
                'type'=> PasswordType::class,
                'first_options'=> [
                'label' =>"Nouveau mot de passe",
                    'attr' => [
                        'class'=>"form-control mb-3",
                    ],
                'help'=> "* de 8 à 15 caractères avec au moins un chiffre et un caractère spéciale",
                'required'=>true,
                    'constraints' => [

                        new NotNull([
                            'message' => "Saisir votre mot de passe",
                        ]),
                        new NotBlank([
                            'message' => "Saisir votre mot de passe",
                        ]),
                    ],
                ],
                'second_options' => [
                    'label' => "Repéter le mot de passe",
                    'help' => "* de 8 à 15 caractères avec un chiffre et un caractère spéciale",
                    'attr' => [
                        'class'=>"form-control mb-3",
                    ],
                    'constraints' => [

                        new NotBlank([
                            'message' => "Repéter le mot de passe",
                        ]),
                    ],
                ],
                'invalid_message' => "Les mots de passe doivent etre identiques.",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => true,
            'label' => false,
            'attr' => [
                "novalidate" => "novalidate",
            ]
        ]);
    }
}