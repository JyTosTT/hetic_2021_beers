<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     * @return Response
     */
    public function mainMenu(string $category_id, string $routeName): Response{
        return $this->render('partials/mainMenu.html.twig', [
        ]);
    }
}
