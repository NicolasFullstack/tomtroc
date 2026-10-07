<?php require __DIR__ . '/../../templates/header.php'; ?>

<article>

    <h1><?= htmlspecialchars($book->getTitle()) ?></h1>

    <p>
        Par <?= htmlspecialchars($book->getAuthor()) ?>
    </p>

<p>
    Proposé par :
    <a href="index.php?page=profile&id=<?= $book->getUserId() ?>">
        Voir le profil
    </a>
</p>

    <?php if ($book->getDescription() !== null): ?>

        <p>
            <?= nl2br(htmlspecialchars($book->getDescription())) ?>
        </p>

    <?php endif; ?>

</article>

<?php require __DIR__ . '/../../templates/footer.php'; ?>