<?php

namespace App\Form;

use App\Entity\NewCharacterClass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class NewCharacterClassType
    extends
    AbstractType
{
    public function buildForm(FormBuilderInterface $builder,
                              array                $options): void
    {
        $builder
            ->add('className',
                TextType::class,
                [
                    'label' => 'Nom de la classe',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Merci de saisir un nom pour votre classe'
                        ]),
                        new Length([
                            'min' => '2',
                            'minMessage' => 'Le nom de la classe doit contenir au moins {{ limit }} caractères',
                            'max' => '100',
                            'maxMessage' => 'Le nom de la classe doit contenir au maximum {{limit}} caractères'
                        ])
                    ]
                ])
            ->add('healthPoints',
                IntegerType::class,
                [
                    'label' => 'Points de vie',
                    'constraints' => [
                        new Positive([
                            'message' => 'Merci de saisir un nombre de PV positif',
                        ]),
                        new NotBlank([
                            'message' => 'Merci de saisir un nombre de PV'
                        ])
                    ]
                ])
            ->add('attackPoints',
                IntegerType::class,
                [
                    'label' => "Points d'attaque",
                    'constraints' => [
                        new Positive([
                            'message' => 'Merci de saisir un nombre de PA positif',
                        ]),
                        new NotBlank([
                            'message' => 'Merci de saisir un nombre de PA'
                        ])
                    ]
                ])
            ->add('energyType',
                TextType::class,
                [
                    'label' => "Type d'énergie utilisée au combat",
                    'attr' => array(
                        'placeholder' => 'Ex: Mana, Endurance ...',),
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Merci de saisir un type d\énergie de combat'
                        ]),
                        new Length([
                            'min' => '2',
                            'minMessage' => 'Le nom du type d\'énergie doit contenir au moins {{ limit }} caractères',
                            'max' => '50',
                            'maxMessage' => 'Le nom du type d\'énergie doit contenir au maximum {{limit}} caractères'
                        ])
                    ]
                ])
            ->add('energyPoints',
                IntegerType::class,
                [
                    'label' => "Points d'énergie",
                    'constraints' => [
                        new Positive([
                            'message' => 'Merci de saisir un nombre de PE positif',
                        ]),
                        new NotBlank([
                            'message' => 'Merci de saisir un nombre de PE'
                        ])
                    ]
                ])
            ->add('classDescription',
                TextAreaType::class,
                [
                    'required' => 'false',
                    'label' => 'Description de la classe',
                    'constraints' => [
                        new Length([
                            'min' => '5',
                            'minMessage' => 'La description de la classe doit contenir au moins {{ limit }} caractères',
                            'max' => '1000',
                            'maxMessage' => 'La description de la classedoit contenir au maximum {{limit}} caractères'
                        ])
                    ]
                ])
            ->add('save',
                SubmitType::class,
                [
                    'label' => 'Créer la classe'
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewCharacterClass::class,
        ]);
    }
}
