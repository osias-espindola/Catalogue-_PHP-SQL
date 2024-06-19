<?php
session_start();
require_once("connect.php");

if (isset($_POST["search"])) {
    $search_term = $_POST["search"];
    $safe_search_term = $db->quote("%$search_term%"); // Sanitize user input

    $sql = "SELECT id, titre, auteur, publication FROM livres WHERE titre LIKE $safe_search_term";
    $query = $db->query($sql);

    if ($query->rowCount() > 0) {
        echo "<table>";
        while ($livre = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$livre['id']}</td>";
            echo "<td>{$livre['titre']}</td>";
            echo "<td>{$livre['auteur']}</td>";
            echo "<td>{$livre['publication']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
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
<form method="post" action="">
    <input type="text" name="search" placeholder="Digite aqui" >
    <input type="submit" value="Pesquisar">
</form>

</body>
</html>