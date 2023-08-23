<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvaliacoesController extends AbstractController
{
    #[Route('/avaliacoes', name: 'app_avaliacoes')]
    public function index(): Response
    {
        return $this->render('avaliacoes/index.html.twig', [
            'controller_name' => 'AvaliacoesController',
        ]);
    }
}
