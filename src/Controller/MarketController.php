<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarketController extends AbstractController
{
    #[Route('/market', name: 'app_market')]
    public function market(): Response
    {
        return $this->render('market/market.html.twig', [
            'controller_name' => 'MarketController',
        ]);
    }
}
