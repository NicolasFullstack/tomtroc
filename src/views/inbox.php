<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Messagerie</h1>

<?php if (empty($users)): ?>

    <p>Vous n'avez aucun message.</p>

<?php else: ?>

    <?php foreach ($users as $user): ?>

        <article>
            <a href="index.php?page=messages&user=<?= (int) $user['id'] ?>">
                <?= htmlspecialchars($user['pseudo']) ?>
            </a>
        </article>

    <?php endforeach; ?>

<?php endif; ?>

<?php require __DIR__ . '/../../templates/footer.php'; ?>