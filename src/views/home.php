<?php require __DIR__ . '/../../templates/header.php'; ?>

<section class="hero">

    <div class="hero-content">

        <h1>Rejoignez nos<br>lecteurs passionnés</h1>

        <p>
            Donnez une nouvelle vie à vos livres en les
            échangeant avec d'autres amoureux de la lecture.
            Nous croyons en la magie du partage de connaissances
            et d'histoires à travers les livres.
        </p>

        <a class="button" href="index.php?page=books">
            Découvrir
        </a>

    </div>

    <div class="hero-image">
        <img src="images/home.png" alt="Livres Tom Troc">
    </div>

</section>


<section class="latest-books">

    <h2>Les derniers livres ajoutés</h2>

    <div class="books-grid">

        <?php foreach ($books as $book): ?>

            <article class="book-card">

                <a href="index.php?page=book&id=<?= $book->getId() ?>">
<?php if ($book->getPhoto() !== null): ?>

            <img
                class="book-cover"
                src="uploads/<?= htmlspecialchars($book->getPhoto()) ?>"
                alt="<?= htmlspecialchars($book->getTitle()) ?>"
            >

        <?php else: ?>

            <div class="book-cover-placeholder">
                Pas de photo
            </div>

        <?php endif; ?>
                    <h3>
                        <?= htmlspecialchars($book->getTitle()) ?>
                    </h3>

                </a>

                <p>
                    <?= htmlspecialchars($book->getAuthor()) ?>
                </p>

            </article>

        <?php endforeach; ?>

    </div>

    <a class="button" href="index.php?page=books">
        Voir tous les livres
    </a>

</section>

<section class="how-it-works">

    <h2>Comment ça marche ?</h2>

    <p class="how-intro">
        Échanger des livres avec Tom Troc c'est simple et convivial.
        Suivez ces étapes pour commencer :
    </p>

    <div class="steps">

        <article class="step">
            <span>01</span>
            <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
        </article>

        <article class="step">
            <span>02</span>
            <p>Ajoutez les livres que vous souhaitez échanger.</p>
        </article>

        <article class="step">
            <span>03</span>
            <p>Parcourez les livres disponibles chez les autres membres.</p>
        </article>

        <article class="step">
            <span>04</span>
            <p>Échangez et profitez de nouvelles lectures.</p>
        </article>

    </div>

    <a class="button" href="index.php?page=register">
        Voir tous les livres
    </a>

</section>

<section class="values">

    <div class="values-container">

        <div class="values-content">

            <h2>Nos valeurs</h2>

            <p>
                La lecture est une porte ouverte sur un monde de possibilités.
                Chez Tom Troc, nous croyons que chaque livre mérite d'être
                découvert et partagé.
            </p>

            <p>
                Nous mettons en relation les lecteurs pour donner une seconde
                vie aux livres et permettre à chacun de découvrir de nouvelles
                histoires.
            </p>

            <p class="team">
                L'équipe Tom Troc
            </p>

        </div>

        <div class="values-image">
            <img src="images/values.png" alt="Les valeurs de Tom Troc">
        </div>

    </div>

</section>

<?php require __DIR__ . '/../../templates/footer.php'; ?>