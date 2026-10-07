<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Mon compte</h1>

<p>
    Pseudo :
    <?= htmlspecialchars($user->getPseudo()) ?>
</p>

<p>
    Email :
    <?= htmlspecialchars($user->getEmail()) ?>
</p>

<a href="index.php?page=add-book">
    Ajouter un livre
</a>

<h2>Mes livres</h2>

<?php if (empty($books)): ?>

    <p>Vous n'avez pas encore ajouté de livre.</p>

<?php else: ?>

    <?php foreach ($books as $book): ?>

        <article>
            <a href="index.php?page=book&id=<?= $book->getId() ?>">
                <?= htmlspecialchars($book->getTitle()) ?>
            </a>

            <p>
                <?= htmlspecialchars($book->getAuthor()) ?>
            </p>

            <a href="index.php?page=edit-book&id=<?= $book->getId() ?>">
    Modifier
</a>

<form method="POST" action="index.php?page=delete-book">
    <input
        type="hidden"
        name="id"
        value="<?= $book->getId() ?>"
    >

    <button type="submit">
        Supprimer
    </button>
</form>

        </article>

    <?php endforeach; ?>

<?php endif; ?>

<?php require __DIR__ . '/../../templates/footer.php'; ?>