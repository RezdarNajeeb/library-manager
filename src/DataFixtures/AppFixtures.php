<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Instead of the following approach we can use Foundry package to create fixtures more efficiently.
        // Just like Laravel factories.
        $category = new Category();
        $category->setName('Science Fiction');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Fantasy');
        $manager->persist($category);

        $category = new Category();
        $category->setName('Mystery');
        $manager->persist($category);

        $manager->flush();

        $book = new Book();
        $book->setTitle('Dune');
        $book->setAuthor('Frank Herbert');
        $book->setIsbn('9780441013593');
        $book->setPublishedAt(new \DateTime('1965-08-01'));
        $book->setCategory($manager->getRepository(Category::class)->findOneBy(['name' => 'Science Fiction']));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('The Hobbit');
        $book->setAuthor('J.R.R. Tolkien');
        $book->setIsbn('9780547928227');
        $book->setPublishedAt(new \DateTime('1937-09-21'));
        $book->setCategory($manager->getRepository(Category::class)->findOneBy(['name' => 'Fantasy']));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('The Hound of the Baskervilles');
        $book->setAuthor('Arthur Conan Doyle');
        $book->setIsbn('9780451528018');
        $book->setPublishedAt(new \DateTime('1902-04-01'));
        $book->setCategory($manager->getRepository(Category::class)->findOneBy(['name' => 'Mystery']));
        $manager->persist($book);

        $book = new Book();
        $book->setTitle('Neuromancer');
        $book->setAuthor('William Gibson');
        $book->setIsbn('9780441569595');
        $book->setPublishedAt(new \DateTime('1984-07-01'));
        $book->setCategory($manager->getRepository(Category::class)->findOneBy(['name' => 'Science Fiction']));
        $manager->persist($book);

        $manager->flush();
    }
}
