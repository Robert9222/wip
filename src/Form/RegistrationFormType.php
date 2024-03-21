<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
            ->add('firstName', TextType::class, ['label' => 'Imię'])
            ->add('lastName', TextType::class, ['label' => 'Nazwisko'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('role', ChoiceType::class, [
                'choices' => [
                    'Tester' => 'tester',
                    'Developer' => 'developer',
                    'Project Manager' => 'project_manager',
                ],
                'label' => 'Stanowisko',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Opis',
                'required' => false,
            ])
            ->add('position', TextType::class, [
                'label' => 'Pozycja',
                'required' => false,
            ])
            // Dodaj resztę nowych pól tutaj
            ->add('testingSystems', TextType::class, [
                'label' => 'Systemy testujące',
                'required' => false,
            ])
            ->add('reportingSystems', TextType::class, [
                'label' => 'Systemy raportowe',
                'required' => false,
            ])
            ->add('knowsSelenium', CheckboxType::class, [
                'label'    => 'Zna Selenium',
                'required' => false,
            ])
            ->add('ideEnvironments', TextType::class, [
                'label' => 'Środowiska IDE',
                'required' => false,
            ])
            ->add('programmingLanguages', TextType::class, [
                'label' => 'Języki programowania',
                'required' => false,
            ])
            ->add('knowsMySQL', CheckboxType::class, [
                'label'    => 'Zna MySQL',
                'required' => false,
            ])
            ->add('projectManagementMethodologies', TextType::class, [
                'label' => 'Metodologie prowadzenia projektów',
                'required' => false,
            ])
            ->add('knowsScrum', CheckboxType::class, [
                'label'    => 'Zna Scrum',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}