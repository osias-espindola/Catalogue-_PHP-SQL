<?php
require_once('connect.php');

// Récupérer les nouveautés
$sql = "SELECT * FROM `livres` WHERE `genre` LIKE 'Roman' AND `sous_genre` LIKE 'Policier' ORDER BY `sous_genre` ASC";
$query = $db->prepare($sql);
$query->execute();
$news = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Policier</title>

</head>

<body>
    <section>

        <?php include 'nav.php'; ?>
        <h2>Policier</h2>

        <?php include 'affiche.php'; ?>
        </div>
    </section>
    <footer>
        <?php include 'footer.php'; ?>

    </footer>

</body>

</html>