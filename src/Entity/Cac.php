<?php

namespace App\Entity;

use App\Repository\CacRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CacRepository::class)]
class Cac extends CharacterClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $staminaPoints;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStaminaPoints(): ?int
    {
        return $this->staminaPoints;
    }

    public function setStaminaPoints(int $staminaPoints): self
    {
        $this->staminaPoints = $staminaPoints;

        return $this;
    }
}
