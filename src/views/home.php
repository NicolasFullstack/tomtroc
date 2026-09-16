<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TomTroc</title>
</head>

<body>

    <h1>TomTroc</h1>

    <h2>Les derniers livres ajoutés</h2>

    <?php foreach ($books as $book): ?>

        <article>
            <h3><?= htmlspecialchars($book->getTitle()) ?></h3>
            <p><?= htmlspecialchars($book->getAuthor()) ?></p>
        </article>

    <?php endforeach; ?>

</body>
</html>