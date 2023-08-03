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
    private ?\DateTimeImmutable $date_échéance = null;

    #[ORM\Column]
    private ?int $priorité = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $statut = [];

    #[ORM\ManyToOne(inversedBy: 'taches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $créateur = null;

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

    public function getDateéchéance(): ?\DateTimeImmutable
    {
        return $this->date_échéance;
    }

    public function setDateéchéance(\DateTimeImmutable $date_échéance): static
    {
        $this->date_échéance = $date_échéance;

        return $this;
    }

    public function getPriorité(): ?int
    {
        return $this->priorité;
    }

    public function setPriorité(int $priorité): static
    {
        $this->priorité = $priorité;

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

    public function getCréateur(): ?Users
    {
        return $this->créateur;
    }

    public function setCréateur(?Users $créateur): static
    {
        $this->créateur = $créateur;

        return $this;
    }
}
