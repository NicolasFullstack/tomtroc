<?php

require_once __DIR__ . '/User.php';

class UserManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByEmail(string $email): ?User
    {
        $query = $this->pdo->prepare(
            'SELECT * FROM users WHERE email = :email'
        );

        $query->execute([
            'email' => $email
        ]);

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return $this->createUser($data);
    }

public function addUser(
    string $pseudo,
    string $email,
    string $password
): bool
{
    $query = $this->pdo->prepare(
        'INSERT INTO users (pseudo, email, password)
         VALUES (:pseudo, :email, :password)'
    );

    return $query->execute([
        'pseudo' => $pseudo,
        'email' => $email,
        'password' => $password
    ]);
}

public function getUserById(int $id): ?User
{
    $query = $this->pdo->prepare(
        'SELECT * FROM users WHERE id = :id'
    );

    $query->execute([
        'id' => $id
    ]);

    $data = $query->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        return null;
    }

    return $this->createUser($data);
}

    private function createUser(array $data): User
    {
        $user = new User();

        $user->setId((int) $data['id']);
        $user->setPseudo($data['pseudo']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setPhoto($data['photo']);
        $user->setCreatedAt($data['created_at']);

        return $user;
    }
}