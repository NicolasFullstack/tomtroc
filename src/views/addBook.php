<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Ajouter un livre</h1>

<form method="POST"
      action="index.php?page=add-book"
      enctype="multipart/form-data">

    <label for="title">Titre</label>
    <input
        type="text"
        id="title"
        name="title"
        required
    >

    <label for="author">Auteur</label>
    <input
        type="text"
        id="author"
        name="author"
        required
    >

    <label for="description">Description</label>
    <textarea
        id="description"
        name="description"
    ></textarea>

<label for="photo">Photo du livre</label>
<input type="file"
       id="photo"
       name="photo"
       accept="image/jpeg, image/png, image/webp">

    <button type="submit">Ajouter le livre</button>

</form>

<?php require __DIR__ . '/../../templates/footer.php'; ?>