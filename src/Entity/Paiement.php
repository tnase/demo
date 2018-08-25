<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $fraisPaiement;

    /**
     * @ORM\Column(type="date")
     */
    private $datePaiement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motifPaiement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $moratoirePaiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Eleve", inversedBy="paiements")
     */
    private $codeEleve;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFraisPaiement(): ?int
    {
        return $this->fraisPaiement;
    }

    public function setFraisPaiement(int $fraisPaiement): self
    {
        $this->fraisPaiement = $fraisPaiement;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    public function getMotifPaiement(): ?string
    {
        return $this->motifPaiement;
    }

    public function setMotifPaiement(?string $motifPaiement): self
    {
        $this->motifPaiement = $motifPaiement;

        return $this;
    }

    public function getMoratoirePaiement(): ?\DateTimeInterface
    {
        return $this->moratoirePaiement;
    }

    public function setMoratoirePaiement(?\DateTimeInterface $moratoirePaiement): self
    {
        $this->moratoirePaiement = $moratoirePaiement;

        return $this;
    }

    public function getCodeEleve(): ?Eleve
    {
        return $this->codeEleve;
    }

    public function setCodeEleve(?Eleve $codeEleve): self
    {
        $this->codeEleve = $codeEleve;

        return $this;
    }
}
