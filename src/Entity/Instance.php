<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstanceRepository")
 */
class Instance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateInstance;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $public;

    /**
    * @ORM\OneToMany(targetEntity="Inscription", mappedBy="instance")
    **/
    private $inscription;

    /**
    * @ORM\ManyToOne(targetEntity="Atelier", inversedBy="instance")
    * @ORM\JoinColumn(name="atelier_id",referencedColumnName="id",nullable=true)
    **/
    private $atelier;

    /**
    * @ORM\ManyToOne(targetEntity="Salle", inversedBy="instance")
    * @ORM\JoinColumn(name="salle_id",referencedColumnName="id",nullable=true)
    **/
    private $salle;

    /**
    * @ORM\ManyToOne(targetEntity="Animateur", inversedBy="instance")
    * @ORM\JoinColumn(name="animateur_id",referencedColumnName="id",nullable=true)
    **/
    private $animateur;

    public function __construct()
    {
        $this->inscription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInstance(): ?\DateTimeInterface
    {
        return $this->dateInstance;
    }

    public function setDateInstance(\DateTimeInterface $dateInstance): self
    {
        $this->dateInstance = $dateInstance;

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
     * @return Collection|Inscription[]
     */
    public function getInscription(): Collection
    {
        return $this->inscription;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscription->contains($inscription)) {
            $this->inscription[] = $inscription;
            $inscription->setInstance($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscription->contains($inscription)) {
            $this->inscription->removeElement($inscription);
            // set the owning side to null (unless already changed)
            if ($inscription->getInstance() === $this) {
                $inscription->setInstance(null);
            }
        }

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

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getAnimateur(): ?Animateur
    {
        return $this->animateur;
    }

    public function setAnimateur(?Animateur $animateur): self
    {
        $this->animateur = $animateur;

        return $this;
    }
}
