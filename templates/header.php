<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>TomTroc</title>
</head>

<body>

<header>
    <nav>
        <a href="index.php">Accueil</a>
    <a href="index.php?page=books">Nos livres à l'échange</a>

    <?php if (isset($_SESSION['user_id'])): ?>

        <a href="index.php?page=account">
    <?= htmlspecialchars($_SESSION['pseudo']) ?>
</a>
<a href="index.php?page=inbox">
    Messagerie
</a>
        <a href="index.php?page=logout">Déconnexion</a>

    <?php else: ?>

        <a href="index.php?page=login">Connexion</a>
        <a href="index.php?page=register">Inscription</a>

    <?php endif; ?>
    </nav>
</header>

<main>