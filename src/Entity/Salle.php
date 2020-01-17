<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomSalle;

    /**
    * @ORM\OneToMany(targetEntity="Instance", mappedBy="Salle")
    **/
    private $instance;

    public function __construct()
    {
        $this->instance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSalle(): ?string
    {
        return $this->nomSalle;
    }

    public function setNomSalle(string $nomSalle): self
    {
        $this->nomSalle = $nomSalle;

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
            $instance->setSalle($this);
        }

        return $this;
    }

    public function removeInstance(Instance $instance): self
    {
        if ($this->instance->contains($instance)) {
            $this->instance->removeElement($instance);
            // set the owning side to null (unless already changed)
            if ($instance->getSalle() === $this) {
                $instance->setSalle(null);
            }
        }

        return $this;
    }
}
