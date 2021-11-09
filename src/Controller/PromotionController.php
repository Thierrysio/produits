<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    /**
     * @Route("/promotion", name="promotion")
     */
    public function index(): Response
    {
        return $this->render('promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
        ]);
    }

     /**
     * @Route("/promotion/afficherlespromotions", name="pathafficherlespromotions")
     */
    public function GetLesPromotions(PromotionRepository $PromotionRepository): Response
    {
        $lesPromotions = $PromotionRepository->findAll();
        return $this->render('promotion/afficherlespromotions.html.twig', [
            'lespromotions'=> $lesPromotions,
        ]);
    }

}
