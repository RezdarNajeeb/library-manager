<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/books/new', name: 'books_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $book = new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($book);
            $manager->flush();

            $this->addFlash('success', 'Book created!');

            return $this->redirectToRoute('books_show', ['id' => $book->getId()]);
        }

        return $this->render('book/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/books/{id}', name: 'books_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', compact('book'));
    }
}
