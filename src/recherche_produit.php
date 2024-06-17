<?php

include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Liste de livres</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="Faire une recherche" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table width="600px" border="1">
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Publication</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="3">Faire une recherche...</td>
        </tr>
        <?php
        } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = 
                "SELECT * FROM livres 
                WHERE id LIKE '%$pesquisa%' 
                OR titre LIKE '%$pesquisa%'
                OR auteur LIKE '%$pesquisa%'
                OR publication LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error); 
            
            if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="3">Aucun résultat n’a été trouvé...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['titre']; ?></td>
                        <td><?php echo $dados['auteur']; ?></td>
                        <td><?php echo $dados['publication']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>
</body>
</html>