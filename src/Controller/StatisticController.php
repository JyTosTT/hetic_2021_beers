<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticController extends AbstractController
{
    /**
     * @Route("/statistic", name="statistic")
     * @param ClientRepository $clientRepository
     * @return Response
     */
    public function index(ClientRepository $clientRepository): Response
    {
        $averageAgeReport = [
            $clientRepository->findAverageScoreByRangeAge(0, 20),
            $clientRepository->findAverageScoreByRangeAge(20, 40),
            $clientRepository->findAverageScoreByRangeAge(40, 60),
            $clientRepository->findAverageScoreByRangeAge(60, 80),
            $clientRepository->findAverageScoreByRangeAge(80, 100),
        ];

        return $this->render('statistic/index.html.twig', [
            'clients' => $clientRepository->findAllByOrder(),
            'averageAgeReport' => $averageAgeReport,
        ]);
    }
}
