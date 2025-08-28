<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookController extends AbstractController
{
    #[Route('/books', name: 'books_index', methods: ['GET'])]
    public function index(BookRepository $repo): Response
    {
        return $this->render('book/index.html.twig', [
           'books' => $repo->findAll(),
        ]);
    }
}
