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
}
