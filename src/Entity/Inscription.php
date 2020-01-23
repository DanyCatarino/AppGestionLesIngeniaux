<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paye;

    /**
    * @ORM\ManyToOne(targetEntity="Inscrit", inversedBy="inscription")
    * @ORM\JoinColumn(name="inscrit_id", referencedColumnName="id", nullable=true)
    **/
    private $inscrit; 

    /**
    * @ORM\ManyToOne(targetEntity="Instance", inversedBy="inscription")
    * @ORM\JoinColumn(name="instance_id", referencedColumnName="id", nullable=true)
    **/
    private $instance; 

    /**
    * @ORM\ManyToOne(targetEntity="Canal", inversedBy="inscription")
    * @ORM\JoinColumn(name="canal_id", referencedColumnName="id", nullable=true)
    **/
    private $canal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getPaye(): ?bool
    {
        return $this->paye;
    }

    public function setPaye(bool $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getInscrit(): ?Inscrit
    {
        return $this->inscrit;
    }

    public function setInscrit(?Inscrit $inscrit): self
    {
        $this->inscrit = $inscrit;

        return $this;
    }

    public function getInstance(): ?Instance
    {
        return $this->instance;
    }

    public function setInstance(?Instance $instance): self
    {
        $this->instance = $instance;

        return $this;
    }

    public function getCanal(): ?Canal
    {
        return $this->canal;
    }

    public function setCanal(?Canal $canal): self
    {
        $this->canal = $canal;

        return $this;
    }
}
