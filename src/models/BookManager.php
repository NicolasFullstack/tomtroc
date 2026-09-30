<?php

require_once __DIR__ . '/Book.php';

class BookManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getLatestBooks(): array
    {
        $query = $this->pdo->query(
            'SELECT * FROM books ORDER BY created_at DESC LIMIT 4'
        );

        $books = [];

        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
            $books[] = $this->createBook($data);
        }

        return $books;
    }


    public function getAllBooks(): array
{
    $query = $this->pdo->query(
        'SELECT * FROM books ORDER BY created_at DESC'
    );

    $books = [];

    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
        $books[] = $this->createBook($data);
    }

    return $books;
}

public function searchBooks(string $search): array
{
    $query = $this->pdo->prepare(
        'SELECT * FROM books
         WHERE title LIKE :search
         ORDER BY created_at DESC'
    );

    $query->execute([
        'search' => '%' . $search . '%'
    ]);

    $books = [];

    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
        $books[] = $this->createBook($data);
    }

    return $books;
}

    private function createBook(array $data): Book
    {
        $book = new Book();

        $book->setId((int) $data['id']);
        $book->setUserId((int) $data['user_id']);
        $book->setTitle($data['title']);
        $book->setAuthor($data['author']);
        $book->setDescription($data['description']);
        $book->setPhoto($data['photo']);
        $book->setAvailable((bool) $data['available']);
        $book->setCreatedAt($data['created_at']);

        return $book;
    }
}