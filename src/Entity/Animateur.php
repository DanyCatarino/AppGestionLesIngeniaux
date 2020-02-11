<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimateurRepository")
 */
class Animateur
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
    * @ORM\OneToMany(targetEntity="Instance", mappedBy="Animateur")
    **/
    private $instance;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $TelephoneContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Notes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentationDisponible;

    public function __toString() {
        return (string) $this->id;
    }

    public function __construct()
    {
        $this->instance = new ArrayCollection();
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
            $instance->setAnimateur($this);
        }

        return $this;
    }

    public function removeInstance(Instance $instance): self
    {
        if ($this->instance->contains($instance)) {
            $this->instance->removeElement($instance);
            // set the owning side to null (unless already changed)
            if ($instance->getAnimateur() === $this) {
                $instance->setAnimateur(null);
            }
        }

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getTelephoneContact(): ?string
    {
        return $this->TelephoneContact;
    }

    public function setTelephoneContact(string $TelephoneContact): self
    {
        $this->TelephoneContact = $TelephoneContact;

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

    public function getDocumentationDisponible(): ?string
    {
        return $this->documentationDisponible;
    }

    public function setDocumentationDisponible(?string $documentationDisponible): self
    {
        $this->documentationDisponible = $documentationDisponible;

        return $this;
    }
}
