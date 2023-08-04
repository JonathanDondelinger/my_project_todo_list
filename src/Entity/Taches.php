<?php

namespace App\Entity;

use App\Repository\TachesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TachesRepository::class)]
class Taches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $date_echeance = null;

    #[ORM\Column]
    private ?int $priorite = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $statut = [];

    #[ORM\ManyToOne(inversedBy: 'taches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $createur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
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

    public function getDateecheance(): ?\DateTimeImmutable
    {
        return $this->date_echeance;
    }

    public function setDateecheance(\DateTimeImmutable $date_echeance): static
    {
        $this->date_echeance = $date_echeance;

        return $this;
    }

    public function getPriorite(): ?int
    {
        return $this->priorite;
    }

    public function setPriorite(int $priorite): static
    {
        $this->priorite = $priorite;

        return $this;
    }

    public function getStatut(): array
    {
        return $this->statut;
    }

    public function setStatut(array $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCreateur(): ?Users
    {
        return $this->createur;
    }

    public function setCreateur(?Users $createur): static
    {
        $this->createur = $createur;

        return $this;
    }
}
