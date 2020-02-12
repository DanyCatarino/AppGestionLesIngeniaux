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
     * @ORM\Column(type="string", length=360)
     */
    private $descriptionCourte;

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
     * @ORM\Column(type="string", length=80)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionLongue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $theme;

    /**
     * @ORM\Column(type="integer", length=100)
     */
    private $nbSeances;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

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

    public function getDescriptionCourte(): ?string
    {
        return $this->descriptionCourte;
    }

    public function setDescriptionCourte(string $descriptionCourte): self
    {
        $this->descriptionCourte = $descriptionCourte;

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

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionLongue(): ?string
    {
        return $this->descriptionLongue;
    }

    public function setDescriptionLongue(?string $descriptionLongue): self
    {
        $this->descriptionLongue = $descriptionLongue;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getNbSeances(): ?int
    {
        return $this->nbSeances;
    }

    public function setNbSeances(int $nbSeances): self
    {
        $this->nbSeances = $nbSeances;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(?\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
