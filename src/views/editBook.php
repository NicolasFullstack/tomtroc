<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Modifier le livre</h1>

<form method="POST" action="index.php?page=edit-book&id=<?= $book->getId() ?>">

    <label for="title">Titre</label>
    <input
        type="text"
        id="title"
        name="title"
        value="<?= htmlspecialchars($book->getTitle()) ?>"
        required
    >

    <label for="author">Auteur</label>
    <input
        type="text"
        id="author"
        name="author"
        value="<?= htmlspecialchars($book->getAuthor()) ?>"
        required
    >

    <label for="description">Description</label>
    <textarea
        id="description"
        name="description"
    ><?= htmlspecialchars($book->getDescription() ?? '') ?></textarea>

    <label for="available">Disponibilité</label>

<select id="available" name="available">
    <option value="1" <?= $book->getAvailable() ? 'selected' : '' ?>>
        Disponible
    </option>

    <option value="0" <?= !$book->getAvailable() ? 'selected' : '' ?>>
        Non disponible
    </option>
</select>

    <button type="submit">Enregistrer les modifications</button>

</form>

<?php require __DIR__ . '/../../templates/footer.php'; ?>