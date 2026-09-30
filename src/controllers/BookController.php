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

public function show(): void
{
    $id = (int) ($_GET['id'] ?? 0);

    $book = $this->bookManager->getBookById($id);

    if ($book === null) {
        echo 'Livre introuvable.';
        return;
    }

    require __DIR__ . '/../views/book.php';
}
}