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
                // Dodatkowe opcje, jeśli potrzebne
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nazwisko',
                // Dodatkowe opcje
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                // Dodatkowe opcje
            ])
            // Przykład dodania dodatkowego pola, np. rola użytkownika
            // Możesz potrzebować niestandardowej logiki, aby to poprawnie obsłużyć
            // Jeśli rola jest prostym stringiem, użyj TextType, ale dla zaawansowanych przypadków,
            // może być potrzebny ChoiceType lub inny typ formularza
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