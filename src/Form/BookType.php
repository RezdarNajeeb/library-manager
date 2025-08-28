<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Book Title',
                'attr' => [
                    'placeholder' => 'Enter the book title',
                    'maxlength' => 255
                ]
            ])
            ->add('author', TextType::class, [
                'label' => 'Author Name',
                'attr' => [
                    'placeholder' => 'Enter the author\'s name',
                ]
            ])
            ->add('isbn', TextType::class, [
                'label' => 'ISBN',
                'attr' => [
                    'placeholder' => '978-0-123-45678-9',
                    'pattern' => '[0-9\-]+',
                ]
            ])
            ->add('publishedAt', DateType::class, [
                'label' => 'Publication Date',
                'widget' => 'single_text',
                'attr' => [
                    'max' => (new \DateTime())->format('Y-m-d')
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder' => 'Select a category',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create Book'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
