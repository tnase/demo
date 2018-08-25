<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class Eleve
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $noms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenoms;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieuNaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $professionParent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contactParent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sante;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $regionOrigine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Classe", inversedBy="eleves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $codeClasse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paiement", mappedBy="codeEleve")
     */
    private $paiements;

    public function __construct()
    {
        $this->paiements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeEleve(): ?string
    {
        return $this->codeEleve;
    }

    public function setCodeEleve(string $codeEleve): self
    {
        $this->codeEleve = $codeEleve;

        return $this;
    }

    public function getNoms(): ?string
    {
        return $this->noms;
    }

    public function setNoms(string $noms): self
    {
        $this->noms = $noms;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(?string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getProfessionParent(): ?string
    {
        return $this->professionParent;
    }

    public function setProfessionParent(?string $professionParent): self
    {
        $this->professionParent = $professionParent;

        return $this;
    }

    public function getContactParent(): ?string
    {
        return $this->contactParent;
    }

    public function setContactParent(?string $contactParent): self
    {
        $this->contactParent = $contactParent;

        return $this;
    }

    public function getSante(): ?string
    {
        return $this->sante;
    }

    public function setSante(?string $sante): self
    {
        $this->sante = $sante;

        return $this;
    }

    public function getRegionOrigine(): ?string
    {
        return $this->regionOrigine;
    }

    public function setRegionOrigine(?string $regionOrigine): self
    {
        $this->regionOrigine = $regionOrigine;

        return $this;
    }

    public function getCodeClasse(): ?Classe
    {
        return $this->codeClasse;
    }

    public function setCodeClasse(?Classe $codeClasse): self
    {
        $this->codeClasse = $codeClasse;

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->setCodeEleve($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->contains($paiement)) {
            $this->paiements->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getCodeEleve() === $this) {
                $paiement->setCodeEleve(null);
            }
        }

        return $this;
    }
}
