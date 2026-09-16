<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';

$controller = new HomeController($pdo);
$controller->index();