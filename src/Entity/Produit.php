<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=FamilleProduit::class, inversedBy="lesproduits")
     */
    private $lafamille;

    /**
     * @ORM\OneToMany(targetEntity=LignePromotion::class, mappedBy="leproduit")
     */
    private $leslignespromotions;

    public function __construct()
    {
        $this->leslignespromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLafamille(): ?FamilleProduit
    {
        return $this->lafamille;
    }

    public function setLafamille(?FamilleProduit $lafamille): self
    {
        $this->lafamille = $lafamille;

        return $this;
    }

    /**
     * @return Collection|LignePromotion[]
     */
    public function getLeslignespromotions(): Collection
    {
        return $this->leslignespromotions;
    }

    public function addLeslignespromotion(LignePromotion $leslignespromotion): self
    {
        if (!$this->leslignespromotions->contains($leslignespromotion)) {
            $this->leslignespromotions[] = $leslignespromotion;
            $leslignespromotion->setLeproduit($this);
        }

        return $this;
    }

    public function removeLeslignespromotion(LignePromotion $leslignespromotion): self
    {
        if ($this->leslignespromotions->removeElement($leslignespromotion)) {
            // set the owning side to null (unless already changed)
            if ($leslignespromotion->getLeproduit() === $this) {
                $leslignespromotion->setLeproduit(null);
            }
        }

        return $this;
    }
}
