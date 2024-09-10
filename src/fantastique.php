<?php
require_once('connect.php');

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Roman' AND `sous_genre` LIKE 'Fantastique' ORDER BY `sous_genre` ASC";
$query = $db->prepare($sql);
$query->execute();
$news = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantastique</title>
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    h2 {
        margin: 1% 0%;
        font-size: 2rem;
        font-weight: bold;
        text-align: center;
        color: #213447;
        text-shadow: 0px 0px 2px #213447;
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
        margin-bottom: 0.5%;
    }

    .ligne {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
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

        h2 {
            font-size: 2rem;
        }
    }

    @media screen and (max-width: 1024px) {

        h2 {
            font-size: 2rem;
        }

        img {
            width: 200px;
            height: 299px;
        }

        .ligne {
            flex-wrap: wrap;
            justify-content: center;
        }
    }

    @media screen and (max-width: 768px) {

        h2 {
            font-size: 1.7rem;
        }
    }

    @media screen and (max-width: 600px) {

        h2 {
            font-size: 1.5rem;
        }
    }

    @media screen and (max-width: 425px) {

        h2 {
            font-size: 1.5rem;
        }
    }

    @media screen and (max-width: 375px) {

        h2 {
            font-size: 1.5rem;
        }
    }
    </style>
</head>

<body>
    <section>

        <?php include 'nav.php'; ?>
        <h2>Fantastique</h2>

        <?php include 'affiche.php'; ?>
        </div>
    </section>
    <footer>
        <?php include 'footer.php'; ?>

    </footer>

</body>

</html>