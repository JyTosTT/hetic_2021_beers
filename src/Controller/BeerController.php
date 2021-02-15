<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @Route("/", name="beer")
     * @param BeerRepository $beerRepository
     * @return Response
     */
    public function index(BeerRepository $beerRepository): Response
    {
        return $this->render('beer/index.html.twig', [
            'beers' => $beerRepository->findBeersLimit()
        ]);
    }

    /**
     * @Route("/beer/{id}", name="beer:focus")
     * @param int $id
     * @param BeerRepository $beerRepository
     * @return Response
     */
    public function beerFocus(int $id, BeerRepository $beerRepository): Response
    {
        return $this->render('beer/beerFocus/index.html.twig', [
            'beer' => $beerRepository->find($id)
        ]);
    }
}
