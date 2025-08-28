<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(public CategoryRepository $repo)
    {
        //
    }

    #[Route('/categories', name: 'categories_index', methods: ['GET'])]
    public function index(): Response
    {
        $rows = $this->repo->findAllWithBooksCount();

        // $rows is an array of [0 => Category, 'bookCount' => int], normalize for Twig
        $categories = array_map(fn($r) => [
            'entity' => $r[0],
            'booksCount' => (int)$r['bookCount'],
        ], $rows);

        return $this->render('category/index.html.twig', compact('categories'));
    }
}
