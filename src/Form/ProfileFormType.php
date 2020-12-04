<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('forename', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('age', NumberType::class, [
                'label' => 'Age',
                'required'   => false,
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'H' => 'Homme',
                    'F' => 'Femme',
                    'N/A' => 'Non binaire'
                ],
                'required'    => false,
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Phone',
                'required'   => false,
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Email',
                'required'   => false,
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])
            ->add('pole', ChoiceType::class, [
                'choices' => [
                    'Direction' => 'Direction',
                    'Production' => 'Production',
                    'Communication' => 'Communication',
                    'Commercial' => 'Commercial',
                    'Administratif' => 'Administratif',
                    'Informatique' => 'Informatique'
                ],
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
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
