<?php

namespace App\Controller;


use App\Entity\Beer;
use App\Repository\BeerRepository;
use App\Repository\CategoryRepository;
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
     * @param Beer $beer
     * @param BeerRepository $beerRepository
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function beerFocus(Beer $beer, BeerRepository $beerRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('beer/beerFocus/index.html.twig', [
            'beer' => $beer,
            'categoriesSpecials' => $categoryRepository->findCategoriesByTermAndBeer($beer, 'special'),
            'categoriesNormals' => $categoryRepository->findCategoriesByTermAndBeer($beer)
        ]);
    }
}
