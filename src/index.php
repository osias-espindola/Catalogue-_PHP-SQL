<?php
require_once('connect.php');

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` WHERE `publication` > '2024-01-01'";
$query = $db->prepare($sql);
$query->execute();
$nouveautes = $query->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les livres par genre
$genres = ['Roman', 'Bande dessinée', 'Théâtre', 'Grandir', 'Essai'];
$livres_par_genre = [];

foreach ($genres as $genre) {
    $sql = "SELECT * FROM `livres` WHERE `genre` LIKE ? ORDER BY `genre` DESC";
    $query = $db->prepare($sql);
    $query->execute([$genre]);
    $livres_par_genre[$genre] = $query->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

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
            /* background-size: cover; */
            background-repeat: no-repeat;
            box-shadow: 0px 5px 5px black;
            color: white;
            text-shadow: 0px 0px 5px #213447;
        }

        h1 {
            font-size: 4.5rem;
        }

        h2 {
            margin: 1.5% 0% 1% ;
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
            width: calc(16.5vw - 20px);
            height: calc(22vw - 20px);
        }
        
        .nouveautes {
            display: flex;
            margin: 1.5%;
           flex-direction: column;
        }

        .ligne {
            display: flex;
        }
        
        .categories {
            /* width: 100%; */
            display: flex;
            justify-content: center;
            margin: 1.5% auto;
            justify-content: space-between;
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
                height: 550px;
            }
        }

        @media screen and (max-width: 1024px) {
            h1 {
                font-size: 4rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .header {

                height: 500px;
            }
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 3.5rem;
            }

            h2 {
                font-size: 1rem;
            }

            .header {
                height: 350px;
                width: auto;
            }
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 2.5rem;
            }

            h2 {
                font-size: 0.5rem;
            }

            .header {
                height: 350px;
                width: auto;
            }
        }

        @media screen and (max-width: 425px) {
            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 0.5rem;
            }

            .header {
                height: 300px;
                width: auto;
            }
        }

        @media screen and (max-width: 375px) {
            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 0.3rem;
            }

            .header {
                height: 150px;
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

    
        <div class="nouveautes">
            <div><h2>NOUVEAUTES</h2></diV>
            <div class="ligne">
                
                        <?php foreach ($nouveautes as $nouveaute): ?>
                            <div class="pad carte">
                                <img src="display_image.php?id=<?=$nouveaute['id']?>" alt="<?=$nouveaute['titre']?>">
                            </div>
                        <?php endforeach; ?>
                   
        </div>
    </section2>
   
    <section3>
        
    <div class="categories">
    <?php foreach ($genres as $genre): ?>
        <div class="wrap">
            <h2><?= $genre ?></h2>
            <?php if (isset($livres_par_genre[$genre])): ?>  <div class="pad carte">
                    <img src="display_image.php?id=<?= $livres_par_genre[$genre]['id'] ?>" alt="<?= $livres_par_genre[$genre]['titre'] ?>">
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
    </section3>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>