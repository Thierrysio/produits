<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    /**
     * @Route("/produit/afficherlesproduits", name="pathafficherlesproduits")
     */
    public function GetLesProduits(ProduitRepository $ProduitRepository): Response
    {
        $lesproduits = $ProduitRepository->findAll();
        return $this->render('produit/afficherlesproduits.html.twig', [
            'lesproduits'=> $lesproduits,
        ]);
    }

    /**
     * @Route("/produit/afficherleproduit", name="pathafficherleproduit")
     */
    public function GetLeProduit(): Response
    {
        return $this->render('produit/afficherleproduit.html.twig', [
            
        ]);
    }
}
