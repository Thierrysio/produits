<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=LignePromotion::class, mappedBy="lapromotion")
     */
    private $leslignes;

    /**
     * @ORM\ManyToOne(targetEntity=FamilleProduit::class, inversedBy="lespromotions")
     */
    private $lafamille;

    public function __construct()
    {
        $this->leslignes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|LignePromotion[]
     */
    public function getLeslignes(): Collection
    {
        return $this->leslignes;
    }

    public function addLesligne(LignePromotion $lesligne): self
    {
        if (!$this->leslignes->contains($lesligne)) {
            $this->leslignes[] = $lesligne;
            $lesligne->setLapromotion($this);
        }

        return $this;
    }

    public function removeLesligne(LignePromotion $lesligne): self
    {
        if ($this->leslignes->removeElement($lesligne)) {
            // set the owning side to null (unless already changed)
            if ($lesligne->getLapromotion() === $this) {
                $lesligne->setLapromotion(null);
            }
        }

        return $this;
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
}
