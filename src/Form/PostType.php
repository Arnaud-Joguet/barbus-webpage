<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Résumé',
                'attr' => [
                    'rows' => 3
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'description',
                'attr' => [
                    'rows' => 6
                ]
            ])
            ->add('firstPicture', UrlType::class, [
                'label' => 'Image à la Une',
                'help' => 'Url d\'une image'
            ])
            ->add('picture', UrlType::class, [
                'label' => 'Image',
                'help' => 'Url d\'une image'
            ])
/*             ->add('createdAt')
            ->add('updatedAt') */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ]
        ]);
    }
}
