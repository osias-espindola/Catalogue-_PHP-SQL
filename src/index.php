<?php
require_once('connect.php');

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` WHERE `publication` > '0001-01-01'";
$query = $db->prepare($sql);
$query->execute();
$news = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les livres par genre
$genres = ['Roman', 'BD', 'Theatre', 'Grandir', 'Essai'];
$livres_genre = [];

foreach ($genres as $genre) {
    $sql = "SELECT * FROM `livres` WHERE `genre` LIKE ? ORDER BY `genre` DESC";
    $query = $db->prepare($sql);
    $query->execute([$genre]);
    $livres_genre[$genre] = $query->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le coin littéraire</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    .header {
        margin: 0;
        padding: 0;
        height: 550px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url("img/bibliotheque.png");
        background-position: bottom;
        background-repeat: no-repeat;
        box-shadow: 0px 5px 5px black;
        color: white;
        text-shadow: 0px 0px 5px #213447;
    }

    html {
        overflow: -moz-scrollbars-none;
        /* Firefox */
    }

    html::-webkit-scrollbar {
        display: none;
        /* Safari and Chrome */
    }

    h1 {
        font-size: 4.5rem;

    }

    h2 {
        margin: 1.5% 0%;
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: #213447;
        text-shadow: 0px 0px 2px #213447;
    }

    .wrap h2:first-of-type {
        margin: 5% 0%;
    }

    img {
        width: 267px;
        height: 400px;
        border-radius: 3px;
    }

    .nouveautes {
        position: relative;
        width: 100%;
        overflow: hidden;
        margin-bottom: 1%;
    }

    .ligne {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carte {
        flex: 0 0 auto;
        margin: 0 5px;
    }

    .arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        padding: 10px;
        cursor: pointer;
        z-index: 2;
    }

    .arrow-left {
        left: 10px;
    }

    .arrow-right {
        right: 10px;
    }

    .categories {
        display: flex;
        justify-content: center;
        gap: 1%;
        margin: 0 auto;
        flex-wrap: wrap;
    }

    @media screen and (max-width: 1440px) {
        h1 {
            font-size: 4.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        .header {
            height: 500px;
        }
    }

    @media screen and (max-width: 1024px) {
        h1 {
            font-size: 3.2rem;
        }

        h2 {
            font-size: 2rem;
        }

        .header {
            height: 410px;
        }

        img {
            width: 300px;
            height: 392px;
        }
    }

    @media screen and (max-width: 768px) {
        h1 {
            font-size: 2.8rem;
        }

        h2 {
            font-size: 1.7rem;
        }

        .header {
            height: 300px;
            width: auto;
        }

        img {
            width: 300px;
            height: 392px;
        }
    }

    @media screen and (max-width: 600px) {
        h1 {
            font-size: 2rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .header {
            height: 260px;
            width: auto;
        }

        img {
            width: 300px;
            height: 392px;
        }
    }

    @media screen and (max-width: 425px) {
        h1 {
            font-size: 1.7rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .header {
            height: 210px;
            width: auto;
        }

        img {
            width: 250px;
            height: 327px;
        }
    }

    @media screen and (max-width: 375px) {
        h1 {
            font-size: 1.5rem;
        }

        h2 {
            font-size: 1.5rem;
        }

        .header {
            height: 200px;
            width: auto;
        }
    }
    </style>
</head>

<body>
    <?php include 'nav.php'; ?>

    <section>
        <div class="header">
            <h1>Bienvenue au coin<br>de littérature<br><br>Bonne visite</h1>
        </div>
    </section>
    <section>
        <div class="nouveautes">
            <h2>NOUVEAUTES</h2>
            <button class="arrow arrow-left">&#10094;</button>
            <div class="ligne">
                <?php foreach($news as $new): ?>
                <div class="carte">
                    <a href="fiche_produit.php?id=<?=$new["id"]?>">
                        <img src="<?=$new['image']?>" alt="<?=$new['titre']?>">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="arrow arrow-right">&#10095;</button>
        </div>
    </section>
    <section>
        <div class="categories">
            <?php foreach($genres as $genre): ?>
            <div class="wrap">
                <h2><?= $genre ?></h2>
                <?php if (isset($livres_genre[$genre])): ?>
                <div class="pad_carte">
                    <a href="<?= $genre ?>.php?id=<?=$livres_genre[$genre]["id"]?>">
                        <img src="<?=$livres_genre[$genre]['image'] ?>" alt="<?= $livres_genre[$genre]['auteur'] ?>">
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>

    <script>
    const ligne = document.querySelector('.ligne');
    const cards = document.querySelectorAll('.carte');
    const leftArrow = document.querySelector('.arrow-left');
    const rightArrow = document.querySelector('.arrow-right');
    let index = 0;

    function showNextImage() {
        index++;
        updateCarousel();
    }

    function showPreviousImage() {
        index--;
        updateCarousel();
    }

    function updateCarousel() {
        const translateX = -index * (cards[0].clientWidth + 20);
        ligne.style.transition = 'transform 0.5s ease-in-out';
        ligne.style.transform = `translateX(${translateX}px)`;

        // Looping logic
        if (index >= cards.length / 2) {
            setTimeout(() => {
                ligne.style.transition = 'none';
                index = 0;
                const resetTranslateX = -index * (cards[0].clientWidth + 20);
                ligne.style.transform = `translateX(${resetTranslateX}px)`;
            }, 500);
        } else if (index < 0) {
            setTimeout(() => {
                ligne.style.transition = 'none';
                index = cards.length / 2 - 1;
                const resetTranslateX = -index * (cards[0].clientWidth + 20);
                ligne.style.transform = `translateX(${resetTranslateX}px)`;
            }, 500);
        }
    }

    leftArrow.addEventListener('click', showPreviousImage);
    rightArrow.addEventListener('click', showNextImage);

    setInterval(showNextImage, 1200);
    </script>
</body>

</html>