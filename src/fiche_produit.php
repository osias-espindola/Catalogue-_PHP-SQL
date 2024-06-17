<?php
require_once('connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

    // Récupérer les détails du produit
    $sql = "SELECT * FROM `livres` WHERE `id` = :id";
    $query = $db->prepare($sql);
    $query->execute([$id]);
    $produit = $query->fetch(PDO::FETCH_ASSOC);

    if ($produit) {
        // Afficher les détails du produit
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


        
</head>
<body>
    <?php include 'nav.php'; ?>

    
    <div class="fiche_produit">
                <h1><?= htmlspecialchars($produit['titre']) ?></h1>
                <img src="display_image.php?id=<?= $produit['id'] ?>" alt="<?= htmlspecialchars($produit['titre']) ?>">
                <p><?= nl2br(htmlspecialchars($produit['description'])) ?></p>
                <!-- Ajoutez d'autres détails du produit ici -->
            </div>
            <?php include 'footer.php'; ?>
        </body>
        </html>
        