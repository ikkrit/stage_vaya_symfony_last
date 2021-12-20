<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortefolioController extends AbstractController
{
    #[Route('/portefolio', name: 'app_portefolio')]
    public function portefolio(): Response
    {
        return $this->render('portefolio/portefolio.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

