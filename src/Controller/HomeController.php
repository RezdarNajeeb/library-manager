<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(BookRepository $bookRepo, CategoryRepository $categoryRepo): Response
    {
        $recentBooks = $bookRepo->findBy([], ['id' => 'DESC'], 5);
        $totalBooks = $bookRepo->count();
        $totalCategories = $categoryRepo->count();

        return $this->render('home/index.html.twig', [
            'recentBooks' => $recentBooks,
            'totalBooks' => $totalBooks,
            'totalCategories' => $totalCategories,
        ]);
    }
}
