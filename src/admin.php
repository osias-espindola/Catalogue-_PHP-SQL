<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login_admin.php");
    exit();
}

require_once('connect.php');

$admin_id = $_SESSION["admin_id"];

//Récupération du prénom de l'utilisateur
$sqlAdmin = "SELECT prenom FROM admin WHERE id = :admin_id";
$queryAdmin = $db->prepare($sqlAdmin);
$queryAdmin->bindValue(":admin_id", $admin_id, PDO::PARAM_INT);
$queryAdmin->execute();
$admin = $queryAdmin->fetch(PDO::FETCH_ASSOC);

if ($admin) {
    $prenom = $admin['prenom'];
} else {
    $prenom = "Administrateur";
}

//Récupération des données livres
$sqlLivres = "SELECT id, titre, auteur, bio, DATE_FORMAT(publication, '%d-%m-%Y') as publication, genre, sous_genre, resume, prix, image 
FROM livres WHERE admin_id = :admin_id"; // Modification de la requête SQL pour inclure la condition admin_id
$queryLivres = $db->prepare($sqlLivres);
$queryLivres->bindValue(":admin_id", $admin_id, PDO::PARAM_INT); // Liaison de la valeur admin_id
$queryLivres->execute();
$livres = $queryLivres->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <link rel="stylesheet" href="navAdmin.css">
    <title>Administration</title>

        
</head>
<body>
<?php include 'nav_admin.php'; ?>
    
    <h1>Base de données des Livres</h1>
   
    <a href="create.php"><button class="retour">Ajouter un produit</button></a>
    <table>
        <thead class="text_center">
            <tr>
                <td>id</td>
                <td>Titre</td>
                <td>Auteur</td>
                <td>Biographie</td>
                <td>Publié</td>
                <td>Genre</td>
                <td>Sous-genre</td>
                <td>Résumé</td>
                <td>Prix</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($livres as $livre) : ?>
            <tr>
                <td><?=$livre['id']?></td>
                <td><?=$livre['titre']?></td>
                <td><?=$livre['auteur']?></td>
                <td><?=$livre['bio']?></td>
                <td><?=$livre['publication']?></td>
                <td><?=$livre['genre']?></td>
                <td><?=$livre['sous_genre']?></td>
                <td><?=$livre['resume']?></td>
                <td><?=$livre['prix']?></td>
                <td><img src="<?=$livre['image']?>" class="taille" alt="<?=$livre['titre']?>"></td>
                <td>
                    <a href="read.php?id=<?=$livre["id"]?>"><img src="img/circle01.png"></a>
                    <a href="update.php?id=<?=$livre["id"]?>"><img src="img/edit01.png"></a>
                    <a href="delete.php?id=<?=$livre["id"]?>"><img src="img/bin01.png"></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>