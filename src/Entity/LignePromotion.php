<?php

namespace App\Entity;

use App\Repository\LignePromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LignePromotionRepository::class)
 */
class LignePromotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="leslignespromotions")
     */
    private $leproduit;

    /**
     * @ORM\ManyToOne(targetEntity=Promotion::class, inversedBy="leslignes")
     */
    private $lapromotion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLeproduit(): ?Produit
    {
        return $this->leproduit;
    }

    public function setLeproduit(?Produit $leproduit): self
    {
        $this->leproduit = $leproduit;

        return $this;
    }

    public function getLapromotion(): ?Promotion
    {
        return $this->lapromotion;
    }

    public function setLapromotion(?Promotion $lapromotion): self
    {
        $this->lapromotion = $lapromotion;

        return $this;
    }
}
