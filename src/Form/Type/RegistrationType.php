<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
                ->add('firstname', TextType::class)
                ->add('lastname', TextType::class)
                ->add('email', EmailType::class)
                ->add('plainPassword' , RepeatedType :: class, 
                    ['type' => PasswordType :: class, 'invalid_message' => 'The password fields must match.'] 
                )
        ;
    }
    

    public function configureOptions(OptionsResolver $resolver) 
    {
        $resolver->setDefaults([
            "validation_groups" => ["Registration"]
        ]);
    }

}
