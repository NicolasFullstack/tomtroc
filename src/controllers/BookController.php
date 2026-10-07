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

public function add(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=login');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($title !== '' && $author !== '') {

            $this->bookManager->addBook(
                (int) $_SESSION['user_id'],
                $title,
                $author,
                $description !== '' ? $description : null
            );

            header('Location: index.php?page=account');
            exit;
        }
    }

    require __DIR__ . '/../views/addBook.php';
}

public function edit(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=login');
        exit;
    }

    $id = (int) ($_GET['id'] ?? 0);

    $book = $this->bookManager->getBookById($id);

    if (
        $book === null
        || $book->getUserId() !== (int) $_SESSION['user_id']
    ) {
        header('Location: index.php?page=account');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $available = ($_POST['available'] ?? '0') === '1';

        if ($title !== '' && $author !== '') {

            $this->bookManager->updateBook(
                $id,
                (int) $_SESSION['user_id'],
                $title,
                $author,
                $description !== '' ? $description : null,
                $available
            );

            header('Location: index.php?page=account');
            exit;
        }
    }

    require __DIR__ . '/../views/editBook.php';
}

public function delete(): void
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?page=login');
        exit;
    }

    $id = (int) ($_POST['id'] ?? 0);

    $book = $this->bookManager->getBookById($id);

    if (
        $book === null
        || $book->getUserId() !== (int) $_SESSION['user_id']
    ) {
        header('Location: index.php?page=account');
        exit;
    }

    $this->bookManager->deleteBook(
        $id,
        (int) $_SESSION['user_id']
    );

    header('Location: index.php?page=account');
    exit;
}

}