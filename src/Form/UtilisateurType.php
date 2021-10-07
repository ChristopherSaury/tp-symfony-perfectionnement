<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pseudo', TextType::class)
            ->add('password', TextType::class)
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'utilisateur' => 'ROLE_USER',
                    'administrateur' => 'ROLE_ADMIN',
                    'moderateur' => 'ROLE_MODO',
                    'ecrivain' => 'ROLE_ECRIVAIN',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Modifier'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
