<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    private ?user $user = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_intervention = null;

    #[ORM\Column(length: 255)]
    private ?string $commentaire = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?signalement $signalement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->date_intervention;
    }

    public function setDateIntervention(\DateTimeInterface $date_intervention): static
    {
        $this->date_intervention = $date_intervention;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getSignalement(): ?signalement
    {
        return $this->signalement;
    }

    public function setSignalement(?signalement $signalement): static
    {
        $this->signalement = $signalement;

        return $this;
    }
}
