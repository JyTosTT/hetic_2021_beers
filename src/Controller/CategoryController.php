<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category:focus")
     * @param int $id
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function categoryFocus(int $id, CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'beer' => $categoryRepository->find($id)
        ]);
    }
}
