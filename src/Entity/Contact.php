<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;
    /**
     * @ORM\Column(type="string", length=15)
     */
    private $telephone;

    /**
    * @ORM\OneToMany(targetEntity="Inscrit", mappedBy="contact")
    **/
    private $inscrit;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $Notes;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Provenance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Segment;

    public function __construct()
    {
        $this->inscrit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|Inscrit[]
     */
    public function getInscrit(): Collection
    {
        return $this->inscrit;
    }

    public function addInscrit(Inscrit $inscrit): self
    {
        if (!$this->inscrit->contains($inscrit)) {
            $this->inscrit[] = $inscrit;
            $inscrit->setContact($this);
        }

        return $this;
    }

    public function removeInscrit(Inscrit $inscrit): self
    {
        if ($this->inscrit->contains($inscrit)) {
            $this->inscrit->removeElement($inscrit);
            // set the owning side to null (unless already changed)
            if ($inscrit->getContact() === $this) {
                $inscrit->setContact(null);
            }
        }

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): self
    {
        $this->Notes = $Notes;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->Provenance;
    }

    public function setProvenance(string $Provenance): self
    {
        $this->Provenance = $Provenance;

        return $this;
    }

    public function getSegment(): ?string
    {
        return $this->Segment;
    }

    public function setSegment(string $Segment): self
    {
        $this->Segment = $Segment;

        return $this;
    }
}
