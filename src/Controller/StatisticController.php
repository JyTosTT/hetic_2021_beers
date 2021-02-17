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
            $clientRepository->findAverageScoreByRangeAge(18, 28),
            $clientRepository->findAverageScoreByRangeAge(28, 38),
            $clientRepository->findAverageScoreByRangeAge(38, 48),
            $clientRepository->findAverageScoreByRangeAge(48, 58),
            $clientRepository->findAverageScoreByRangeAge(58, 68),
            $clientRepository->findAverageScoreByRangeAge(68, 78),
        ];

        return $this->render('statistic/index.html.twig', [
            'clients' => $clientRepository->findAllByOrder(),
            'averageAgeReport' => $averageAgeReport,
        ]);
    }
}
