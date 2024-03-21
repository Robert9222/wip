<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Imię',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nazwisko',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
            ])

            ->add('role', TextType::class, [
                'label' => 'Rola',
                // Dodatkowe opcje
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}