<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstname', TextType::class, [
                    'required' => true,
                    'label' => 'First Name'
                ])
                ->add('lastname', TextType::class, [
                    'required' => true,
                    'label' => 'Last Name'
                ])
                ->add('email', TextType::class, [
                    'required' => true,
                    'label' => 'Email Address'
                ])
                ->add('phone', TextType::class, [
                    'required' => false,
                    'label' => 'Telephone Number'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
                // Configure your form options here
        ]);
    }

}
