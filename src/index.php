<?php
require_once('connect.php');



$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Théâtre' ORDER BY `sous_genre` ASC";

$query = $db->prepare($sql);
$query->execute();
$nouveautes = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Roman' ORDER BY `genre` DESC";

$query = $db->prepare($sql);
$query->execute();
$roman = $query->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Bande dessinée' ORDER BY `genre` DESC";

$query = $db->prepare($sql);
$query->execute();
$bd = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Théâtre' ORDER BY `genre` DESC";

$query = $db->prepare($sql);
$query->execute();
$theatre = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Grandir' ORDER BY `genre` DESC";

$query = $db->prepare($sql);
$query->execute();
$grandir = $query->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Essai' ORDER BY `genre` DESC";
$query = $db->prepare($sql);
$query->execute();
$essai = $query->fetch(PDO::FETCH_ASSOC);

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
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 550px;
            background-image: url("img/bibliotheque.png");
            background-position: bottom;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0px 5px 5px black;
            color: white;
            text-shadow: 0px 0px 5px #213447;
        }

        h1 {
            font-size: 3rem;
        }

        body {
            text-align: center;
        }

        h2, .categories p {
            margin: 1.5% 0% 1% ;
            font-size: 2rem;
            font-weight: bold;
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
        }

        
        .categories {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 1.5% auto;
        }

        
        
        @media screen and (max-width: 1440px) {
            h1 {
                font-size: 3.5rem;
            }

            .header {
                height: 500px;
            }
        }

        @media screen and (min-width: 1440px) {
            h1 {
                font-size: 4rem;
            }

            .header {
                height: 550px;
            }
        }

        @media screen and (max-width: 1024px) {
            h1 {
                font-size: 3rem;
            }

            .header {
                height: 350px;
            }
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 2.75rem;
            }

            .header {
                height: 300px;
            }
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 2.5rem;
            }

            .header {
                height: 250px;
            }
        }

        @media screen and (max-width: 425px) {
            h1 {
                font-size: 2rem;
            }

            .header {
                height: 200px;
            }
        }

        @media screen and (max-width: 375px) {
            h1 {
                font-size: 1.5rem;
            }

            .header {
                height: 150px;
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

    <h2>NOUVEAUTES</h2>
        <div class="nouveautes">
                
                        <?php foreach ($nouveautes as $nouveaute): ?>
                            <div class="pad carte">
                                <img src="display_image.php?id=<?=$nouveaute['id']?>" alt="<?=$nouveaute['titre']?>">
                            </div>
                        <?php endforeach; ?>
                   
        </div>
    </section2>
   
    <section3>
        
        <div class="categories">
            <div>
                <p>Romans</p>
                <div class="pad carte">
                <img src="display_image.php?id=<?=$roman['id']?>" alt="<?=$roman['titre']?>">
                </div>
            </div>
            <div>
                <p>BD</p>
                <div class="pad carte">
                <img src="display_image.php?id=<?=$bd['id']?>" alt="<?=$bd['titre']?>">
                </div>
            </div>
            <div>
                <p>THEATRE</p>
                <div class="pad carte">
                <img src="display_image.php?id=<?=$theatre['id']?>" alt="<?=$theatre['titre']?>">
                </div>
            </div>
            <div>
                <p>GRANDIR</p>
                <div class="pad carte">
                <img src="display_image.php?id=<?=$grandir['id']?>" alt="<?=$grandir['titre']?>">
                </div>
            </div>
            <div>
                <p>ESSAIS</p>
                <div class="pad carte">
                <img src="display_image.php?id=<?=$essai['id']?>" alt="<?=$essai['titre']?>">
                </div>
            </div>
        </div>
    </section3>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>