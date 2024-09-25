<?php

namespace App\Form;

use App\Entity\materiels;
use App\Entity\salles;
use App\Entity\Signalement;
use App\Entity\user;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignalementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                'class' => user::class,
                'placeholder' => 'Sélectionnez votre statut',
                'choice_label' => 'statut',
            ])
            ->add('salles', EntityType::class, [
                'class' => salles::class,
                'placeholder' => 'Sélectionnez la salle',
                'choice_label' => 'nom',
            ])
            ->add('materiel', EntityType::class, [
                'class' => materiels::class,
                'placeholder' => 'Sélectionnez le materiel concérné',
                'choice_label' => 'nom',
            ])
            ->add('description')
            ->add('date_signalement', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Signalement::class,
        ]);
    }
}
