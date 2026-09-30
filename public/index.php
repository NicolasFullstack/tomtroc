<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';
require_once __DIR__ . '/../src/controllers/BookController.php';

$page = $_GET['page'] ?? 'home';

if ($page === 'books') {

    $controller = new BookController($pdo);
    $controller->index();

} elseif ($page === 'book') {

    $controller = new BookController($pdo);
    $controller->show();

} else {

    $controller = new HomeController($pdo);
    $controller->index();
}