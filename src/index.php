<?php
require_once('connect.php');

$sql = "SELECT * FROM `livres` WHERE `publication` > '2024-05-01' ORDER BY `genre` ASC";
$query = $db->prepare($sql);
$query->execute();
$nouveautes = $query->fetchAll(PDO::FETCH_ASSOC);
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

        img {
            width: 178px;
            height: 233px;
            image-rendering: high-quality;
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
        <div class="carroussel">
            <div>
                <table>
                    <tr>
                        <?php foreach ($nouveautes as $nouveaute): ?>
                            <td>
                                <img src="display_image.php?id=<?=$nouveaute['id']?>" alt="<?=$nouveaute['titre']?>">
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </section2>
    <section3></section3>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>