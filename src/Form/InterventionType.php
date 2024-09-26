<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\signalement;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_intervention', null, [
                'widget' => 'single_text',
            ])
            ->add('commentaire')
            ->add('user', EntityType::class, [
                'class' => user::class,
                'choice_label' => 'statut',
            ])
            ->add('signalement', EntityType::class, [
                'class' => signalement::class,
                'choice_label' => 'description',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
