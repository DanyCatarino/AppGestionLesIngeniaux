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
    * @ORM\OneToMany(targetEntity="Seance", mappedBy="Salle")
    **/
    private $seance;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $capaciteSalle;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NomGestionnaireSalle;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $EmailGestionnaireSalle;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TelephoneGestionnaireSalle;


    public function __toString() {
        return (string) $this->id;
    }

    public function __construct()
    {
        $this->seance = new ArrayCollection();
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
            $seance->setSalle($this);
        }

        return $this;
    }

    public function removeSeance(Seance $seance): self
    {
        if ($this->seance->contains($seance)) {
            $this->seance->removeElement($seance);
            // set the owning side to null (unless already changed)
            if ($seance->getSalle() === $this) {
                $seance->setSalle(null);
            }
        }

        return $this;
    }


    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCapaciteSalle(): ?int
    {
        return $this->capaciteSalle;
    }

    public function setCapaciteSalle(int $capaciteSalle): self
    {
        $this->capaciteSalle = $capaciteSalle;

        return $this;
    }

    public function getNomGestionnaireSalle(): ?string
    {
        return $this->NomGestionnaireSalle;
    }

    public function setNomGestionnaireSalle(string $NomGestionnaireSalle): self
    {
        $this->NomGestionnaireSalle = $NomGestionnaireSalle;

        return $this;
    }

    public function getEmailGestionnaireSalle(): ?string
    {
        return $this->EmailGestionnaireSalle;
    }

    public function setEmailGestionnaireSalle(string $EmailGestionnaireSalle): self
    {
        $this->EmailGestionnaireSalle = $EmailGestionnaireSalle;

        return $this;
    }

    public function getTelephoneGestionnaireSalle(): ?string
    {
        return $this->TelephoneGestionnaireSalle;
    }

    public function setTelephoneGestionnaireSalle(string $TelephoneGestionnaireSalle): self
    {
        $this->TelephoneGestionnaireSalle = $TelephoneGestionnaireSalle;

        return $this;
    }
}
