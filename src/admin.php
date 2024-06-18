<?php
require_once("connect.php");

// Récupérer les données de stage
$sql = "SELECT id, titre, auteur, bio, DATE_FORMAT(publication, '%d-%m-%Y') as publication, genre, sous_genre, resume, prix, image 
    FROM livres WHERE admin_id = :admin_id";

$query = $db->prepare($sql);
$query->bindValue(":admin_id", 2, PDO::PARAM_INT);
$query->execute();

$livres = $query->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Administration</title>
    <style>

body {
    margin: 0;
    padding: 0;
    background-color: #edfcfd;
    font-family: "poppins-regular", sans-serif;
    text-align: center;
    margin-bottom: 20px;
    box-sizing: content-box;
    color: #5b5b5c;
    }

    button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    justify-content: center;
    text-decoration: none;
    font-size: 16px;
    margin: 4px 0px 4px 50px;
    cursor: pointer;
    border-radius: 5px;
}

table {
    border-collapse: collapse;
    background-color: #f5f5f5;
}

thead td {
    background-color: #3278e2;;
    text-align: center;
    color: #fff;
}

table, td {
    margin: 2% auto 0;
    border: 1px solid #acabab;
}

th, td {
    padding: 8px;
    text-align: left;
}

.taille {
    width: 50px;
    height: 70px;
}   



    </style>
</head>
<body>
<nav class="navbar">
                
        <div class="navbar-right">
        <a href="disconnect.php"><button class="disconnect">Déconnection</button></a>
        </div>
    </nav>
    <h1>Base de données des Livres</h1>
    <a href="create.php"><button class="ajout">Ajouter</button></a>
    <table>
        <thead class="text_center">
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
        </thead>
        <tbody>
            <?php foreach($livres as $livre) : ?>

                <td><?=$livre['id']?></td>
                <td><?=$livre['titre']?></td>
                <td><?=$livre["auteur"]?></td>
                <td><?=$livre['bio']?></td>
                <td><?=$livre['publication']?></td>
                <td><?=$livre['genre']?></td>
                <td><?=$livre['sous_genre']?></td>
                <td><?=$livre["resume"]?></td>
                <td><?=$livre["prix"]?></td>
                <td><img src="display_image.php?id=<?=$livre['id']?>" class="taille" alt="<?=$livre['titre']?>"></td>

                <td>
                    <a href="read.php?id=<?=$livre["id"]?>"><img src="img/circle01.png"></a>
                    <a href="upauteur.php?id=<?=$livre["id"]?>"><img src="img/edit01.png"></a>
                    <a href="delete.php?id=<?=$livre["id"]?>"></a><img src="img/bin01.png"></a>
                </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        
        
</body>
</html>