<?php

require_once __DIR__ . '/../models/BookManager.php';

class BookController
{
    private BookManager $bookManager;

    public function __construct(PDO $pdo)
    {
        $this->bookManager = new BookManager($pdo);
    }

    public function index(): void
    {
        $books = $this->bookManager->getAllBooks();

        require __DIR__ . '/../views/books.php';
    }
}