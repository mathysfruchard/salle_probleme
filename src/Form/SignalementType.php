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
            ->add('description')
            ->add('date_signalement', null, [
                'widget' => 'single_text',
            ])
            ->add('user', EntityType::class, [
                'class' => user::class,
                'choice_label' => 'id',
            ])
            ->add('materiel', EntityType::class, [
                'class' => materiels::class,
                'choice_label' => 'id',
            ])
            ->add('salles', EntityType::class, [
                'class' => salles::class,
                'choice_label' => 'id',
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
