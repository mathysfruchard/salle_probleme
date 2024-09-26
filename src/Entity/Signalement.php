<?php

namespace App\Entity;

use App\Repository\SignalementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SignalementRepository::class)]
class Signalement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_signalement = null;

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    private ?user $user = null;

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    private ?materiels $materiel = null;

    #[ORM\ManyToOne(inversedBy: 'signalements')]
    private ?salles $salles = null;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateSignalement(): ?\DateTimeInterface
    {
        return $this->date_signalement;
    }

    public function setDateSignalement(\DateTimeInterface $date_signalement): static
    {
        $this->date_signalement = $date_signalement;

        return $this;
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

    public function getMateriel(): ?materiels
    {
        return $this->materiel;
    }

    public function setMateriel(?materiels $materiel): static
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getSalles(): ?salles
    {
        return $this->salles;
    }

    public function setSalles(?salles $salles): static
    {
        $this->salles = $salles;

        return $this;
    }
}
