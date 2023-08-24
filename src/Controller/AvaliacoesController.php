<?php

namespace App\Controller;

use App\Entity\Avaliacao;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvaliacoesController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    #[Route('/avaliacoes', name: 'app_avaliacoes')]
    public function index(): Response
    {
        $user = $this->getUser();

        $data = true;

        if (!empty($user->getDtConfirmacao())) {
            $data = false;
        }

        return $this->render('avaliacoes/index.html.twig', [
            'user' => $user,
            'data' => $data
        ]);
    }

    #[Route('/avaliacoes/dev', name: 'app_avaliacoes_show')]
    public function avaliacao(): Response
    {
        $user = $this->getUser();

        return $this->render('avaliacoes/show.html.twig', [
            'data' => $user->getDtConfirmacao()->format('Y-m-d\TH:i:s'),
        ]);
    }

    /**
     * @param Request $request
     * @return void
     */
    #[Route('/avaliacao/store', name: 'app_avaliacoes_store', methods: ['POST'])]
    public function store(Request $request)
    {
        $responseAvaliacao = $request->request->all();
        $avaliacao = new Avaliacao($responseAvaliacao);


    }

    #[Route('/confirmAvaliacao', name: 'app_confirm')]
    public function confirmacaoAvaliacao(): Response
    {
        $date = new \DateTime('@' . strtotime('now'));
        $user = $this->getUser();
        $user->setDtConfirmacao($date);

        $this->entityManager->flush();

        return $this->redirectToRoute('app_avaliacoes_show');
    }
}
