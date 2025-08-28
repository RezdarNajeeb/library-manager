<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/categories', name: 'categories_index', methods: ['GET'])]
    public function index(CategoryRepository $repo): Response
    {
        return $this->render('categories/index.html.twig', [
            'categoriesWithCount' => $repo->findAllWithBookCount()
        ]);
    }

    #[Route('/categories/{id}', name: 'categories_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('categories/show.html.twig', compact('category'));
    }
}
