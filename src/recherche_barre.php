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
    <style>
            .campo-label {
        display: block;
        width: 360px;
        background-color: #fff;
        position: relative;
        margin: auto;
        border-radius: 16px;
        overflow: hidden;
        }

        .campo-input {
            color: #555;
            border: none;
            padding: 0 10px;
            outline: none;
            width: 100%;
            font-size: 1.5rem;
            line-height: 2em;
            font-family: system-ui;
            border-bottom: 3px solid #e2e2e2;
            background-color: transparent;
        }

        .btn-busca {
            background-color: #ffffff;
            color: #007cff;
            width: 54px;
            border: none;
            font-size: 30px;
            line-height: -15px;
            height: 43px;
            display: block;
            cursor: pointer;
            position: absolute;
            top: 3px;
            right: 0;
        }

        .btn-busca:hover {
            color: #555;
        }

    </style>
</head>
<body>
<!-- <form method="post" action="">
    <input type="text" name="search" placeholder="Digite aqui" >
    <input type="submit" value="Pesquisar">
</form> -->

<form action="" method="post">
    <label class="campo-label" data-text="">
        <input type="text" name="search" class="campo-input" placeholder="Pesquisa...">
        <button class="btn-busca" type="submit" value=""><i class="icon icon-search"></i></button>
    </label>
</form>

<script>

    const campoLabel = document.querySelector(".campo-label");
    const textInput = document.querySelector("input[type='text']");

    textInput.addEventListener("keyup", event => {
        campoLabel.setAttribute("data-text", event.target.value);
    });
</script>
</body>
</html>