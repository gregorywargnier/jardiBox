<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //lastname
            ->add('lastName',TextType::class, [
                "label" => "Nom",
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre nom",
                    ])
                ]
            ])
            //firstname
            ->add('firstName',TextType::class, [
                "label" => "Prénom",
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre prénom",
                    ])
                ]
            ])
            //birthday
            ->add('birthday', BirthdayType::class,[
                "label" => "date de naissance",
                "widget" =>'single_text',
                "attr" => [
                    'class' => "form-control",
                    'format' => 'yyyy-MM-dd',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre date de naissance",
                    ])
                ]
            ])
            //phone
            ->add('phone', TextType::class, [
                "label" => "telephone",
                "attr" => [
                    'class'=> "form-control",
                ],
                'constraints' => [
                    new Regex([
                        "pattern" => '/^[0-9]*$/',
                        "message" => "Don't use spaces in your password."
                    ]),
                    new NotBlank([
                        'message' => "Saisir votre numéro de téléphone",
                    ])
                ]
            ])
            //address
            ->add('address', TextType::class, [
                'label' => 'adresse',
                "attr" => [
                    'class' => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre adresse",
                    ])
                ]
            ])
            //additionalAddress
            ->add('additionalAddress', TextType::class, [
                'required' => false,
                'label' => "complément d'adresse",
                "attr" => [
                    'class' => "form-control",

                ],
            ])
            //city
            ->add('city', TextType::class,[
                'label'=> "ville",
                "attr"=>[
                    'class' => 'form-control',
                ]
            ])
            //postalcode
            ->add('postalCode',NumberType::class, [
                'label'=> "code postale",
                "attr" => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre code postale",
                    ])
                ]
            ])
            //email
            ->add('email', EmailType::class, [
                "label" => "Email",
                "attr" => [
                    "class" => "form-control",
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "Saisir votre email",
                    ])
                ]
            ])            //password
            ->add('password', PasswordType::class,[
                "label" => "Password",
                'help' => "* de 8 à 15 caractères avec au moins un chiffre et un caractère spéciale",
                "attr" => [
                    'class'=> "form-control",
                ],
                'constraints' => [

                    new NotNull([
                        'message' => "Saisir votre mot de passe",
                    ]),
                    new NotBlank([
                        'message' => "Saisir votre mot de passe",
                    ]),
                ],
            ])
            /* Accepte les conditions d'utilisation */
            ->add('agreeTerms', CheckboxType::class, [
                'label' => false,
                "attr" => [
                    "class" => "filled-in",
                ],
                'mapped' => false, // ce champ n'est pas dans l'entité User
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
