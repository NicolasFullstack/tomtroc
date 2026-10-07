<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Inscription</h1>

<form method="POST" action="index.php?page=register">

    <label for="pseudo">Pseudo</label>
    <input
        type="text"
        id="pseudo"
        name="pseudo"
        required
    >

    <label for="email">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        required
    >

    <label for="password">Mot de passe</label>
    <input
        type="password"
        id="password"
        name="password"
        required
    >

    <button type="submit">S'inscrire</button>

</form>

<?php require __DIR__ . '/../../templates/footer.php'; ?>