<?php

require_once __DIR__ . '/../models/UserManager.php';

class AuthController
{
    private UserManager $userManager;

    public function __construct(PDO $pdo)
    {
        $this->userManager = new UserManager($pdo);
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $pseudo = trim($_POST['pseudo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($pseudo !== '' && $email !== '' && $password !== '') {

                $passwordHash = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

                $this->userManager->addUser(
                    $pseudo,
                    $email,
                    $passwordHash
                );

                header('Location: index.php?page=login');
                exit;
            }
        }

        require __DIR__ . '/../views/register.php';
    }

public function login(): void
{
    $error = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->userManager->getUserByEmail($email);

        if (
            $user !== null
            && password_verify($password, $user->getPassword())
        ) {

            $_SESSION['user_id'] = $user->getId();
            $_SESSION['pseudo'] = $user->getPseudo();

            header('Location: index.php');
            exit;
        }

        $error = 'Email ou mot de passe incorrect.';
    }

    require __DIR__ . '/../views/login.php';
}

public function logout(): void
{

    session_unset();
    session_destroy();

    header('Location: index.php');
    exit;
}

}