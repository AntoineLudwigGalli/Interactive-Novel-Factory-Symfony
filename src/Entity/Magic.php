<?php

namespace App\Entity;

use App\Repository\MagicRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagicRepository::class)]
class Magic extends CharacterClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $manaPoints;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManaPoints(): ?int
    {
        return $this->manaPoints;
    }

    public function setManaPoints(int $manaPoints): self
    {
        $this->manaPoints = $manaPoints;

        return $this;
    }
}
