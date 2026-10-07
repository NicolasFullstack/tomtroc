<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>
    Conversation avec
    <?= htmlspecialchars($otherUser->getPseudo()) ?>
</h1>

<section>

    <?php if (empty($messages)): ?>

        <p>Aucun message pour le moment.</p>

    <?php else: ?>

        <?php foreach ($messages as $message): ?>

            <article>

                <?php if ($message->getSenderId() === $userId): ?>

                    <strong>Moi</strong>

                <?php else: ?>

                    <strong>
                        <?= htmlspecialchars($otherUser->getPseudo()) ?>
                    </strong>

                <?php endif; ?>

                <p>
                    <?= nl2br(htmlspecialchars($message->getContent())) ?>
                </p>

                <small>
                    <?= htmlspecialchars($message->getCreatedAt()) ?>
                </small>

            </article>

        <?php endforeach; ?>

    <?php endif; ?>

</section>

<form
    method="POST"
    action="index.php?page=messages&user=<?= $otherUser->getId() ?>"
>

    <label for="content">Votre message</label>

    <textarea
        id="content"
        name="content"
        required
    ></textarea>

    <button type="submit">
        Envoyer
    </button>

</form>

<?php require __DIR__ . '/../../templates/footer.php'; ?>