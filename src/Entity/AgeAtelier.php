<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgeAtelierRepository")
 */
class AgeAtelier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Age")
     * @ORM\JoinColumn(name="age_id",referencedColumnName="id",nullable=false)
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Atelier")
     * @ORM\JoinColumn(name="atelier_id",referencedColumnName="id",nullable=false)
     */
    private $atelier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAge(): ?Age
    {
        return $this->age;
    }

    public function setAge(?Age $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAtelier(): ?Atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?Atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }
}
