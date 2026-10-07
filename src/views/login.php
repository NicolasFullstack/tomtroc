<?php require __DIR__ . '/../../templates/header.php'; ?>

<h1>Connexion</h1>

<?php if ($error !== ''): ?>

    <p><?= htmlspecialchars($error) ?></p>

<?php endif; ?>

<form method="POST" action="index.php?page=login">

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

    <button type="submit">Se connecter</button>

</form>

<?php require __DIR__ . '/../../templates/footer.php'; ?>