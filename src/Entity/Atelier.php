<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AtelierRepository")
 */
class Atelier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $type;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
    * @ORM\OneToMany(targetEntity="Instance", mappedBy="Atelier")
    **/
    private $instance;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $public;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Age", inversedBy="ateliers")
     */
    private $age;

    public function __toString() {
        return (string) $this->id;
    }

    public function __construct()
    {
        $this->instance = new ArrayCollection();
        $this->age = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection|Instance[]
     */
    public function getInstance(): Collection
    {
        return $this->instance;
    }

    public function addInstance(Instance $instance): self
    {
        if (!$this->instance->contains($instance)) {
            $this->instance[] = $instance;
            $instance->setAtelier($this);
        }

        return $this;
    }

    public function removeInstance(Instance $instance): self
    {
        if ($this->instance->contains($instance)) {
            $this->instance->removeElement($instance);
            // set the owning side to null (unless already changed)
            if ($instance->getAtelier() === $this) {
                $instance->setAtelier(null);
            }
        }

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(string $public): self
    {
        $this->public = $public;

        return $this;
    }

    /**
     * @return Collection|Age[]
     */
    public function getAge(): Collection
    {
        return $this->age;
    }

    public function addAge(Age $age): self
    {
        if (!$this->age->contains($age)) {
            $this->age[] = $age;
            $age->setAge($this);
        }

        return $this;
    }

    public function removeAge(Age $age): self
    {
        if ($this->age->contains($age)) {
            $this->age->removeElement($age);
            $age->setAge(null);
        }

        return $this;
    }
}
