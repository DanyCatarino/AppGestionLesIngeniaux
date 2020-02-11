<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
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
    * @ORM\OneToMany(targetEntity="Inscription", mappedBy="instance")
    **/
    private $inscription;

    /**
    * @ORM\ManyToOne(targetEntity="Atelier", inversedBy="instance")
    * @ORM\JoinColumn(name="atelier_id", referencedColumnName="id", nullable=true)
    **/
    private $atelier;

    /**
    * @ORM\ManyToOne(targetEntity="Animateur", inversedBy="instance")
    * @ORM\JoinColumn(name="animateur_id", referencedColumnName="id", nullable=true)
    **/
    private $animateur;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Seance", mappedBy="instance")
     */
    private $seance;

    public function __construct()
    {
        $this->inscription = new ArrayCollection();
        $this->seance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnimateur(): ?Animateur
    {
        return $this->animateur;
    }

    public function setAnimateur(?Animateur $animateur): self
    {
        $this->animateur = $animateur;

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

    /**
     * @return Collection|Seance[]
     */
    public function getSeance(): Collection
    {
        return $this->seance;
    }

    public function addSeance(Seance $seance): self
    {
        if (!$this->seance->contains($seance)) {
            $this->seance[] = $seance;
            $seance->setInstance($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seance->contains($seance)) {
            $this->seance->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getInstance() === $this) {
                $seance->setInstance(null);
            }
        }

        return $this;
    }
}
