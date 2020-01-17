<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgeRepository")
 */
class Age
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
    private $classeAge;

    /**
    * @ORM\OneToMany(targetEntity="AgeAtelier", mappedBy="Age")
    **/
    private $ageAtelier;

    public function __construct()
    {
        $this->ageAtelier = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasseAge(): ?string
    {
        return $this->classeAge;
    }

    public function setClasseAge(string $classeAge): self
    {
        $this->classeAge = $classeAge;

        return $this;
    }

    /**
     * @return Collection|AgeAtelier[]
     */
    public function getAgeAtelier(): Collection
    {
        return $this->ageAtelier;
    }

    public function addAgeAtelier(AgeAtelier $ageAtelier): self
    {
        if (!$this->ageAtelier->contains($ageAtelier)) {
            $this->ageAtelier[] = $ageAtelier;
            $ageAtelier->setAge($this);
        }

        return $this;
    }

    public function removeAgeAtelier(AgeAtelier $ageAtelier): self
    {
        if ($this->ageAtelier->contains($ageAtelier)) {
            $this->ageAtelier->removeElement($ageAtelier);
            // set the owning side to null (unless already changed)
            if ($ageAtelier->getAge() === $this) {
                $ageAtelier->setAge(null);
            }
        }

        return $this;
    }
}
