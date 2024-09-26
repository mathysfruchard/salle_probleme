<?php

namespace App\Form;

use App\Entity\Intervention;
use App\Entity\Signalement;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\SignalementRepository;

class InterventionType extends AbstractType
{
    private SignalementRepository $signalementRepository;

    public function __construct(SignalementRepository $signalementRepository)
    {
        $this->signalementRepository = $signalementRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_intervention', null, [
                'widget' => 'single_text',
            ])
            ->add('commentaire')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'statut',
            ])
            ->add('signalement', EntityType::class, [
                'class' => Signalement::class,
                'choice_label' => 'description',
                'placeholder' => 'Sélectionnez un signalement',
                'choices' => $this->signalementRepository->findSignalementsWithoutIntervention(), // Utiliser les signalements sans intervention
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
