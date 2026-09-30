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
      $search = $_GET['search'] ?? '';

if ($search !== '') {
    $books = $this->bookManager->searchBooks($search);
} else {
    $books = $this->bookManager->getAllBooks();
}

require __DIR__ . '/../views/books.php';  
}
}