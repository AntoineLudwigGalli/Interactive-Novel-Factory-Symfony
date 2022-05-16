<?php

namespace App\Entity;

use App\Repository\NewCharacterClassRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewCharacterClassRepository::class)]
class NewCharacterClass extends CharacterClass
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $energyType;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $energyPoints;

    #[ORM\Column(type: 'string', length: 50)]
    private $className;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $classDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergyType(): ?string
    {
        return $this->energyType;
    }

    public function setEnergyType(?string $energyType): self
    {
        $this->energyType = $energyType;

        return $this;
    }

    public function getEnergyPoints(): ?int
    {
        return $this->energyPoints;
    }

    public function setEnergyPoints(?int $energyPoints): self
    {
        $this->energyPoints = $energyPoints;

        return $this;
    }

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    public function getClassDescription(): ?string
    {
        return $this->classDescription;
    }

    public function setClassDescription(?string $classDescription): self
    {
        $this->classDescription = $classDescription;

        return $this;
    }
}
