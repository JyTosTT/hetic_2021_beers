<?php

namespace App\Controller;

use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country/{id}", name="country:focus")
     * @param int $id
     * @param CountryRepository $countryRepository
     * @return Response
     */
    public function countryFocus(int $id, CountryRepository $countryRepository): Response
    {
        return $this->render('country/index.html.twig', [
            'country' => $countryRepository->find($id),
        ]);
    }
}
