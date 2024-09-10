<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    $_SESSION["message"] = "Vous devez être connecté pour accéder à cette page";
    header("Location: login_admin.php");
    exit();
}

if(isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");

    $id = strip_tags($_GET["id"]);

    $sql = "SELECT id, titre, auteur, bio, DATE_FORMAT(publication, '%d-%m-%Y') as publication, genre, sous_genre, resume, prix, image 
FROM livres WHERE id = :id";
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <link rel="stylesheet" href="navAdmin.css">
    <title>Page de <?= $livre["titre"] ?></title>


        
</head>
<body>
    
<?php include 'nav_admin.php'; ?>
    
    <div class="fiche_produit">
                <div>
                    <h1><?= $livre['titre'] ?></h1>
                    <p><em><span>Parution le : </em></span><?=$livre['publication'] ?></p>
                    <img src="<?= $livre['image'] ?>" alt="<?= $livre['titre'] ?>">
                </div>
                <div>
                    <p><em><span>Auteur : </em></span><?= nl2br($livre['auteur']) ?></p>
                    <p><em><span>Résumé : </em></span><?=$livre['resume'] ?></p>
                    <p><em><span>L'auteur : </em></span><?=$livre['bio'] ?></p>
                    <p><em><span>Prix : </em></span><?=$livre['prix'] . " €" ?></p>
                </div>
    </div>
            <a href="admin.php"><button class="retour">Retour</button></a>

        </body>
        </html>
        