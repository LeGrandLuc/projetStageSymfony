<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaisonRepository::class)
 */
class Saison
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
    private $anneeDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $anneeFin;

    /**
     * @ORM\OneToOne(targetEntity=Joue::class, inversedBy="saison", cascade={"persist", "remove"})
     */
    private $joue;

    public function __construct($p1, $tab)
    {
        $this->anneeDebut = $p1;
        $this->anneeFin = $tab;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnneeDebut(): ?\DateTimeInterface
    {
        return $this->anneeDebut;
    }

    public function setAnneeDebut(\DateTimeInterface $anneeDebut): self
    {
        $this->anneeDebut = $anneeDebut;

        return $this;
    }

    public function getAnneeFin(): ?\DateTimeInterface
    {
        return $this->anneeFin;
    }

    public function setAnneeFin(\DateTimeInterface $anneeFin): self
    {
        $this->anneeFin = $anneeFin;

        return $this;
    }

    public function getJoue(): ?Joue
    {
        return $this->joue;
    }

    public function setJoue(?Joue $joue): self
    {
        $this->joue = $joue;

        return $this;
    }
}
