<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CanalRepository")
 */
class Canal
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
    private $nomCanal;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $urlCanal;

    /**
    * @ORM\OneToMany(targetEntity="Inscription", mappedBy="canal")
    **/
    private $inscription;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Externe;

    /**
     * @ORM\Column(type="float")
     */
    private $Comission;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Direct;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $NomDuContact;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $EmailDuContact;
    public function __construct()
    {
        $this->inscription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCanal(): ?string
    {
        return $this->nomCanal;
    }

    public function setNomCanal(string $nomCanal): self
    {
        $this->nomCanal = $nomCanal;

        return $this;
    }

    public function getUrlCanal(): ?string
    {
        return $this->urlCanal;
    }

    public function setUrlCanal(?string $urlCanal): self
    {
        $this->urlCanal = $urlCanal;

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
            $inscription->setCanal($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscription->contains($inscription)) {
            $this->inscription->removeElement($inscription);
            // set the owning side to null (unless already changed)
            if ($inscription->getCanal() === $this) {
                $inscription->setCanal(null);
            }
        }

        return $this;
    }

    public function getExterne(): ?string
    {
        return $this->Externe;
    }

    public function setExterne(?string $Externe): self
    {
        $this->Externe = $Externe;

        return $this;
    }

    public function getComission(): ?float
    {
        return $this->Comission;
    }

    public function setComission(float $Comission): self
    {
        $this->Comission = $Comission;

        return $this;
    }

    public function getDirect(): ?string
    {
        return $this->Direct;
    }

    public function setDirect(string $Direct): self
    {
        $this->Direct = $Direct;

        return $this;
    }

    public function getNomDuContact(): ?string
    {
        return $this->NomDuContact;
    }

    public function setNomDuContact(string $NomDuContact): self
    {
        $this->NomDuContact = $NomDuContact;

        return $this;
    }

    public function getEmailDuContact(): ?string
    {
        return $this->EmailDuContact;
    }

    public function setEmailDuContact(string $EmailDuContact): self
    {
        $this->EmailDuContact = $EmailDuContact;

        return $this;
    }
}
