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
        $rows = $repo->findAllWithBookCount();

        // $rows is an array of ['category' => Category, 'book_count' => int], normalize for Twig
        $categories = array_map(fn($r) => [
            'entity' => $r['category'],
            'booksCount' => (int)$r['book_count'],
        ], $rows);

        return $this->render('categories/index.html.twig', compact('categories'));
    }

    #[Route('/categories/{id}', name: 'categories_show', methods: ['GET'])]
    public function show(Category $category): Response
    {
        return $this->render('categories/show.html.twig', compact('category'));
    }
}
