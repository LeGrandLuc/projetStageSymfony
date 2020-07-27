<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Logo::class, mappedBy="club")
     */
    private $Logo;

    /**
     * @ORM\OneToOne(targetEntity=Joue::class, inversedBy="club", cascade={"persist", "remove"})
     */
    private $Joue;

    public function __construct($p1, $tab)
    {
        $this->nom = $p1;
        $this->logo = $tab;
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

    /**
     * @return Collection|Logo[]
     */
    public function getLogo(): Collection
    {
        return $this->Logo;
    }

    public function addLogo(Logo $logo): self
    {
        if (!$this->Logo->contains($logo)) {
            $this->Logo[] = $logo;
            $logo->setClub($this);
        }

        return $this;
    }

    public function removeLogo(Logo $logo): self
    {
        if ($this->Logo->contains($logo)) {
            $this->Logo->removeElement($logo);
            // set the owning side to null (unless already changed)
            if ($logo->getClub() === $this) {
                $logo->setClub(null);
            }
        }

        return $this;
    }

    public function getJoue(): ?Joue
    {
        return $this->Joue;
    }

    public function setJoue(?Joue $Joue): self
    {
        $this->Joue = $Joue;

        return $this;
    }
}
