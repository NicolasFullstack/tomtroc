<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TomTroc</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="site-header">

    <nav class="navbar">

        <a class="logo" href="index.php">
            Tom Troc
        </a>

        <div class="nav-links">

            <a href="index.php">Accueil</a>

            <a href="index.php?page=books">
                Nos livres à l'échange
            </a>

            <?php if (isset($_SESSION['user_id'])): ?>

                <a href="index.php?page=inbox">
                    Messagerie
                </a>

                <a href="index.php?page=account">
                    Mon compte
                </a>

                <a href="index.php?page=logout">
                    Déconnexion
                </a>

            <?php else: ?>

                <a href="index.php?page=login">
                    Connexion
                </a>

            <?php endif; ?>

        </div>

    </nav>

</header>

<main>

<main>