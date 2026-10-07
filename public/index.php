<?php

session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';
require_once __DIR__ . '/../src/controllers/BookController.php';
require_once __DIR__ . '/../src/controllers/AuthController.php';

$page = $_GET['page'] ?? 'home';

if ($page === 'books') {

    $controller = new BookController($pdo);
    $controller->index();

} elseif ($page === 'book') {

    $controller = new BookController($pdo);
    $controller->show();

} elseif ($page === 'register') {

    $controller = new AuthController($pdo);
    $controller->register();

} elseif ($page === 'login') {

    $controller = new AuthController($pdo);
    $controller->login();

    } elseif ($page === 'logout') {

    $controller = new AuthController($pdo);
    $controller->logout();

} else {

    $controller = new HomeController($pdo);
    $controller->index();
}