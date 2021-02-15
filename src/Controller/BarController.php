<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     * @param string $category_id
     * @param string $routeName
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function mainMenu(string $category_id, string $routeName, CategoryRepository $categoryRepository): Response {
        return $this->render('partials/mainMenu.html.twig', [
            'categories' => $categoryRepository->findCategoriesByTerm('normal')
        ]);
    }
}
