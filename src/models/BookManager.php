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

public function getBooksByUserId(int $userId): array
{
    $query = $this->pdo->prepare(
        'SELECT * FROM books
         WHERE user_id = :user_id
         ORDER BY created_at DESC'
    );

    $query->execute([
        'user_id' => $userId
    ]);

    $books = [];

    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
        $books[] = $this->createBook($data);
    }

    return $books;
}

public function addBook(
    int $userId,
    string $title,
    string $author,
    ?string $description,
    ?string $photo
): bool
{
    $query = $this->pdo->prepare(
        'INSERT INTO books (user_id, title, author, description, photo)
         VALUES (:user_id, :title, :author, :description, :photo)'
    );

    return $query->execute([
        'user_id' => $userId,
        'title' => $title,
        'author' => $author,
        'description' => $description,
        'photo' => $photo
    ]);
}

public function deleteBook(int $id, int $userId): bool
{
    $query = $this->pdo->prepare(
        'DELETE FROM books
         WHERE id = :id
         AND user_id = :user_id'
    );

    return $query->execute([
        'id' => $id,
        'user_id' => $userId
    ]);
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

public function getBookById(int $id): ?Book
{
    $query = $this->pdo->prepare(
        'SELECT * FROM books WHERE id = :id'
    );

    $query->execute([
        'id' => $id
    ]);

    $data = $query->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        return null;
    }

    return $this->createBook($data);
}

public function updateBook(
    int $id,
    int $userId,
    string $title,
    string $author,
    ?string $description,
    bool $available
): bool
{
    $query = $this->pdo->prepare(
        'UPDATE books
         SET title = :title,
             author = :author,
             description = :description,
             available = :available
         WHERE id = :id
         AND user_id = :user_id'
    );

    return $query->execute([
        'id' => $id,
        'user_id' => $userId,
        'title' => $title,
        'author' => $author,
        'description' => $description,
        'available' => $available
    ]);
}

}