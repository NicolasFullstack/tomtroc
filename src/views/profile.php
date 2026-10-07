<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>
    <?= htmlspecialchars($user->getPseudo()) ?>
</h1>

<h2>Ses livres</h2>

<?php if (empty($books)): ?>

    <p>Cet utilisateur n'a pas encore de livre.</p>

<?php else: ?>

    <?php foreach ($books as $book): ?>

        <article>
            <a href="index.php?page=book&id=<?= $book->getId() ?>">
                <?= htmlspecialchars($book->getTitle()) ?>
            </a>

            <p>
                <?= htmlspecialchars($book->getAuthor()) ?>
            </p>
        </article>

    <?php endforeach; ?>

<?php endif; ?>


<?php if (
    isset($_SESSION['user_id'])
    && (int) $_SESSION['user_id'] !== $user->getId()
): ?>

    <a href="index.php?page=messages&user=<?= $user->getId() ?>">
        Envoyer un message
    </a>

<?php endif; ?>


<?php require __DIR__ . '/../../templates/footer.php'; ?>