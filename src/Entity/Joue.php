<?php

namespace App\Entity;

use App\Repository\JoueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueRepository::class)
 */
class Joue
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBut;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroJoueurClub;

    /**
     * @ORM\OneToOne(targetEntity=Club::class, mappedBy="Joue", cascade={"persist", "remove"})
     */
    private $club;

    /**
     * @ORM\OneToOne(targetEntity=Joueur::class, mappedBy="Joue", cascade={"persist", "remove"})
     */
    private $joueur;

    /**
     * @ORM\OneToOne(targetEntity=Saison::class, mappedBy="joue", cascade={"persist", "remove"})
     */
    private $saison;

    public function __construct($p1, $p2, $p3, $p4,$p5)
    {
        $this->nbBut = $p1;
        $this->numeroJoueurClub = $p2;
        $this->joueur = $p3;
        $this->saison = $p4;
        $this->club = $p5;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbBut(): ?int
    {
        return $this->nbBut;
    }

    public function setNbBut(int $nbBut): self
    {
        $this->nbBut = $nbBut;

        return $this;
    }

    public function getNumeroJoueurClub(): ?int
    {
        return $this->numeroJoueurClub;
    }

    public function setNumeroJoueurClub(int $numeroJoueurClub): self
    {
        $this->numeroJoueurClub = $numeroJoueurClub;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        // set (or unset) the owning side of the relation if necessary
        $newJoue = null === $club ? null : $this;
        if ($club->getJoue() !== $newJoue) {
            $club->setJoue($newJoue);
        }

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        // set (or unset) the owning side of the relation if necessary
        $newJoue = null === $joueur ? null : $this;
        if ($joueur->getJoue() !== $newJoue) {
            $joueur->setJoue($newJoue);
        }

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        // set (or unset) the owning side of the relation if necessary
        $newJoue = null === $saison ? null : $this;
        if ($saison->getJoue() !== $newJoue) {
            $saison->setJoue($newJoue);
        }

        return $this;
    }
}
