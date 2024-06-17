<?php

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");

    $id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM livres WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $livre = $query->fetch();

    // Vérifie si le livre existe
    if (!$livre) {
        header("Location: fiche_produit.php");
        exit();
    }
} else {
    // Redirige l'utilisateur vers la page index.php s'il manque l'ID de l'titre dans l'URL
    header("Location: index.php");
    exit();
}

?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de <?= $livre["titre"] ?></title>


        
</head>
<body>
    <?php include 'nav.php'; ?>

    
    <div class="fiche_produit">
                <h1><?= $livre['titre'] ?></h1>
                <img src="display_image.php?id=<?= $livre['id'] ?>" alt="<?= $livre['titre'] ?>">
                <p><?= nl2br($livre['auteur']) ?></p>
                <p><?=$livre['resume'] ?></p>
                <p><?=$livre['bio'] ?></p>
                <p><?=$livre['prix'] . " €" ?></p>
                <!-- Ajoutez d'autres détails du produit ici -->
            </div>
            <?php include 'footer.php'; ?>
        </body>
        </html>
        