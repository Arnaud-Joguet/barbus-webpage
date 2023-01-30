<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('nickName', TextType::class, [
                'label' => 'Surnom'
            ])
            ->add('jerseyNumber', IntegerType::class, [
                'label' => 'numéro de maillot',
                'attr' => [
                    'min' => 0,
                    'max' => 99,
                ]
            ])
            ->add('stickSide', TextType::class, [
                'label' => 'côté de crosse',
                'help' => 'Right, Left, Regular ou Full-Right'
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Image',
                'help' => 'Url d\'une image'
            ])
            ->add('role', TextType::class, [
                'label' => 'rôle',
                'help' => 'Attaquant, Défenseur ou Gardien'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
