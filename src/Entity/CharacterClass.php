<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class CharacterClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $healthPoints;

    #[ORM\Column(type: 'integer')]
    private $attackPoints;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHealthPoints(): ?int
    {
        return $this->healthPoints;
    }

    public function setHealthPoints(int $healthPoints): self
    {
        $this->healthPoints = $healthPoints;

        return $this;
    }

    public function getAttackPoints(): ?int
    {
        return $this->attackPoints;
    }

    public function setAttackPoints(int $attackPoints): self
    {
        $this->attackPoints = $attackPoints;

        return $this;
    }
}
