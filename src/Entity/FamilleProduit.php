<?php

namespace App\Entity;

use App\Repository\FamilleProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilleProduitRepository::class)
 */
class FamilleProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="lafamille")
     */
    private $lesproduits;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="lafamille")
     */
    private $lespromotions;

    public function __construct()
    {
        $this->lesproduits = new ArrayCollection();
        $this->lespromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getLesproduits(): Collection
    {
        return $this->lesproduits;
    }

    public function addLesproduit(Produit $lesproduit): self
    {
        if (!$this->lesproduits->contains($lesproduit)) {
            $this->lesproduits[] = $lesproduit;
            $lesproduit->setLafamille($this);
        }

        return $this;
    }

    public function removeLesproduit(Produit $lesproduit): self
    {
        if ($this->lesproduits->removeElement($lesproduit)) {
            // set the owning side to null (unless already changed)
            if ($lesproduit->getLafamille() === $this) {
                $lesproduit->setLafamille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getLespromotions(): Collection
    {
        return $this->lespromotions;
    }

    public function addLespromotion(Promotion $lespromotion): self
    {
        if (!$this->lespromotions->contains($lespromotion)) {
            $this->lespromotions[] = $lespromotion;
            $lespromotion->setLafamille($this);
        }

        return $this;
    }

    public function removeLespromotion(Promotion $lespromotion): self
    {
        if ($this->lespromotions->removeElement($lespromotion)) {
            // set the owning side to null (unless already changed)
            if ($lespromotion->getLafamille() === $this) {
                $lespromotion->setLafamille(null);
            }
        }

        return $this;
    }
}
