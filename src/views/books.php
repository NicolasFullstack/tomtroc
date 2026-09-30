<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Nos livres à l'échange</h1>

<form method="GET" action="index.php">

    <input type="hidden" name="page" value="books">

    <input
        type="search"
        name="search"
        placeholder="Rechercher un livre"
        value="<?= htmlspecialchars($search) ?>"
    >

    <button type="submit">Rechercher</button>

</form>

<?php foreach ($books as $book): ?>

    <article>

    <a href="index.php?page=book&id=<?= $book->getId() ?>">

        <h2><?= htmlspecialchars($book->getTitle()) ?></h2>

    </a>

    <p><?= htmlspecialchars($book->getAuthor()) ?></p>

</article>

<?php endforeach; ?>

<?php require __DIR__ . '/../../templates/footer.php'; ?>