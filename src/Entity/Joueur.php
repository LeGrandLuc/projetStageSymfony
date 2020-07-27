<?php

namespace App\Entity;

use App\Repository\JoueurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JoueurRepository::class)
 */
class Joueur
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
     * @ORM\Column(type="string", length=35)
     */
    private $prenom;

    /**
     * @ORM\OneToOne(targetEntity=Joue::class, inversedBy="joueur", cascade={"persist", "remove"})
     */
    private $Joue;

    public function __construct($p1, $tab)
    {
        $this->nom = $p1;
        $this->prenom = $tab;
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
