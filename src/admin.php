<?php

session_start();

// if (!isset($_SESSION["user_id"])) {
//     header("Location: login.php");
//     exit();
// }

require_once("connect.php");

// $user_id = $_SESSION["user_id"];

// // Récupérer le nom de l'utilisateur
// $sqlUser = "SELECT user_name FROM users WHERE id = :user_id";
// $queryUser = $db->prepare($sqlUser);
// $queryUser->bindValue(":user_id", $user_id, PDO::PARAM_INT);
// $queryUser->execute();
// $user = $queryUser->fetch(PDO::FETCH_ASSOC);

// if ($user) {
//     $user_name = $user['user_name'];
// } else {
//     $user_name = "Utilisateur";
// }

// Récupérer les données de livres
$sql = "SELECT * FROM livres WHERE id = :id";

$query = $db->prepare($sql);
$query->bindValue(":id", $id, PDO::PARAM_INT);
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
    <title>Administration/title>
</head>
<body>
<nav class="navbar">
                
        <div class="navbar-right">
        <a href="disconnect.php"><button class="disconnect">Déconnection</button></a>
        </div>
    </nav>
    <h1>Votre Tableau de Bord Général</h1>

<?php 
?>
    <a href="create.php"><button class="ajout">Ajouter</button></a>
    <table>
        <thead class="text_center">
            <td>titre</td>
            <td>auteur</td>
            <td>bio</td>
            <td>publication</td>
            <td>genre</td>
            <td>sous-genre</td>
            <td>resume</td>
            <td>prix</td>
            <td>image</td>
            <td>Action</td>
        </thead>
        <tbody>
                <td><?=$livre['titre']?></td>
                <td><?=$livre["auteur"]?></td>
                <td><?=$livre['bio']?></td>
                <td><?=$livre['publication']?></td>
                <td><?=$livre['genre']?></td>
                <td><?=$livre['sous_genre']?></td>
                <td><?=$livre["resume"]?></td>
                <td><?=$livre['image']?></td>

                <td>
                    <a href="read.php?id=<?=$stage["id"]?>"><img src="circle01.png"></a>
                    <a href="update.php?id=<?=$stage["id"]?>"><img src="edit01.png"></a>
                    <a href="delete.php?id=<?=$stage["id"]?>"><img src="bin01.png"></a>
                </td>

                </tr>
            
        </tbody>
        
        
</body>
</html>
