<?php

namespace App\Controller;

use App\Entity\Avaliacao;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvaliacoesController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $entityManager)
    {

    }

    /**
     * @return Response
     */
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

    /**
     * @return Response
     */
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
     * @return Response
     */
    #[Route('/avaliacao/store', name: 'app_avaliacoes_store', methods: ['POST'])]
    public function store(Request $request)
    {
        try {
            $responseAvaliacao = $request->request->all();
            $avaliacao = new Avaliacao();

            $avaliacao->setUrlGit($responseAvaliacao['url_git']);
            $avaliacao->setUrlAplicacao($responseAvaliacao['url_aplicacao']);
            $avaliacao->setTech($responseAvaliacao['tech']);
            $avaliacao->setDesafios($responseAvaliacao['desafios']);
            $avaliacao->setPretensaoSalarial($responseAvaliacao['pretensao_salarial']);
            $avaliacao->setCrescimentoEsperado($responseAvaliacao['crescimento_esperado']);
            $avaliacao->setFeedback($responseAvaliacao['feedback']);
            $avaliacao->setDisponibilidade($responseAvaliacao['disponibilidade']);

            $user = $this->getUser();
            $avaliacao->setUser($user);
            $user->addAvaliacao($avaliacao);

            $this->entityManager->persist($user);
            $this->entityManager->persist($avaliacao);

            $this->entityManager->flush();

            return $this->redirectToRoute('app_avaliacoes');

        } catch (\Exception $exception) {
            return $this->redirectToRoute('app_avaliacoes_show');
        }
    }

    /**
     * @return Response
     * @throws \Exception
     */
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
