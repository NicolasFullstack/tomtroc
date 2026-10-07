<?php

require_once __DIR__ . '/../models/BookManager.php';
require_once __DIR__ . '/../models/UserManager.php';

class UserController
{
    private UserManager $userManager;
    private BookManager $bookManager;

    public function __construct(PDO $pdo)
    {
        $this->userManager = new UserManager($pdo);
        $this->bookManager = new BookManager($pdo);
    }

    public function account(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }

        $user = $this->userManager->getUserById(
            (int) $_SESSION['user_id']
        );

        if ($user === null) {
            header('Location: index.php?page=logout');
            exit;
        }

$books = $this->bookManager->getBooksByUserId(
    $user->getId()
);

        require __DIR__ . '/../views/account.php';
    }

public function profile(): void
{
    $id = (int) ($_GET['id'] ?? 0);

    $user = $this->userManager->getUserById($id);

    if ($user === null) {
        header('Location: index.php');
        exit;
    }

    $books = $this->bookManager->getBooksByUserId($user->getId());

    require __DIR__ . '/../views/profile.php';
}

}