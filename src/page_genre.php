<?php
require_once('connect.php');

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` WHERE `publication` > year(now())" ;
$query = $db->prepare($sql);
$query->execute();
$news = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` where 'genre' = ':genre'  ORDER BY `publication` DESC" ;
$query = $db->prepare($sql);
bindValue(":genre",$_GET['genre']);


// Récupérer les livres par sous_genre
// $sous_genres = ['Roman', 'Bande dessinée', 'Théâtre', 'Grandir', 'Essai'];
// $livres_sous_genre = [];

// foreach ($sous_genres as $sous_genre) {
//     $sql = "SELECT * FROM `livres` WHERE `sous_genre` LIKE ? ORDER BY `sous_genre` DESC";
//     $query = $db->prepare($sql);
//     $query->execute([$sous_genre]);
//     $livres_sous_genre[$sous_genre] = $query->fetch(PDO::FETCH_ASSOC);
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        h1 {
            font-size: 4.5rem;
        }

        h2 {
            margin: 1% 0% 1% ;
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
            display: flex;

            flex-direction: column;
            width: 100%; /* Largeur du conteneur */
            overflow: hidden; /* Masquer le dépassement d'image */
            white-space: nowrap; /* Empêcher le saut de ligne */
        }

        .ligne {
            display: flex;
        }
        
        .categories {

            display: flex;
            justify-content: center;
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
                width:300px;
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
                width:300px;
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
                width:250px;
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

    <section1>
        <div class="header">
            <h1>Bienvenue au coin<br>
            de littérature<br><br>Bonne visite</h1>
        </div>
    </section1>
    <section2>

    
        <div class="nouveautes ">
            <div><h2>Nouveautés du genre </h2></diV>
            <div class="ligne">
                
                        <?php foreach($news as $new): ?>
                            <div class="pad carte">
                                <a href="fiche_produit.php?id=<?=$new["id"]?>"><img src="<?=$new['image']?>" alt="<?=$new['titre']?>"></a>
                            
                            </div>
                        <?php endforeach; ?>
                   
            </div>
        </div>
        <div class="nouveautes">
        <h2>Genre</h2>
        <div class="ligne">
            <!-- <?php foreach ($genres as $genre): ?> -->
                <div class="pad carte">
                    <a href="fiche_produit.php?id=<?= $genre["id"] ?>"><img src="<?= $genre['image'] ?>" alt="<?= $genre['titre'] ?>"></a>
                </div>
            <!-- <?php endforeach; ?> -->
        </div>
    </div>
    </section2>
   
    <section3>
<!--         
    <div class="categories">
        <?php foreach($sous_genres as $sous_genre): ?>
            <div class="wrap">
                <h2><?= $sous_genre ?></h2>
                <?php if (isset($livres_sous_genre[$sous_genre])): ?>
                    <div class="pad_carte">
                        <a href="fiche_produit.php?id=<?=$livres_sous_genre[$sous_genre]["id"]?>"><img src="<?=$livres_sous_genre[$sous_genre]['image'] ?>" alt="<?= $livres_sous_genre[$sous_genre]['auteur'] ?>"></a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="categories">
    <?php foreach ($sous_genres as $sous_genre): ?>
        <div class="wrap">
            <h2><?= $sous_genre ?></h2>
            <?php if (isset($livres_sous_genre[$sous_genre])): ?>
                <div class="pad_carte">
                    <a href="fiche_produit.php?id=<?= $livres_sous_genre[$sous_genre]['id'] ?>">
                        <img src="<?= $livres_sous_genre[$sous_genre]['image'] ?>" alt="<?= $livres_sous_genre[$sous_genre]['auteur'] ?>">
                    </a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </div>

    </section3> -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>