<?php

require_once('connect.php');

$sql = "SELECT * FROM `livres` ORDER BY `genre` DESC";

$query = $db->prepare($sql);
$query->execute();
$tous_genre = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style_nav.css">
    <title>nav barre</title>
</head>

<body>
    <nav>
        <div class=nav_barra>
            <div class="logo_nav">
                <img src="/img/Logo05.png" alt="" class="logo">
                <div class="page_name">
                    <p>Le coin de littérature</p>
                </div>
            </div>

            <div class="recherche">
                <input type="text" name="recherche" id="recherche" placeholder="  Faire une recherche">
                <button type="submit" class="loupe"><img src="/img/loupe.png" alt="Pesquisar"></button>
            </div>
            <div class="icon">

                <div class="user">
                    <img src="/img/user.png" alt="">
                </div>
                <div class="panier">
                    <img src="/img/panier.png" alt="">
                </div>
                <div class="menuBurger">
                    <img src="/img/menuBurger.png" alt="" onclick="clickMenu()">
                    <!-- <span  id= "burger" class="material-symbols-outlined" onclick= "clickMenu()">menu</span> -->
                </div>
            </div>
        </div>
        <div class=>
            <div class="menu_fixe ">
                <ul>
                    <li><a href="http://127.0.0.1:5500/index.html">Retour au Portfolio</a></li>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="roman.php">ROMANS</a></li>
                    <li><a href="bd.php">DB</a></li>
                    <li><a href="theatre.php">THÉÂTRE</a></li>
                    <li><a href="grandir.php">GRANDIR</a></li>
                    <li><a href="essai.php">ESSAIS</a></li>
                </ul>
            </div>
            <div class="menu_ul" id="objets">
                <div class="menu_genre ligne_separe">
                    <ul>
                        <li data-genre="romans"><a href="#">ROMANS</a></li>
                        <li data-genre="db"><a href="#">DB</a></li>
                        <li data-genre="theatre"><a href="#">THEATRE</a></li>
                        <li data-genre="grandir"><a href="#">GRANDIR</a></li>
                        <li data-genre="essais"><a href="#">ESSAIS</a></li>
                    </ul>
                </div>
                <div class="ligne_separe">
                    <ul>
                        <li data-genre="page_d_accueil"><a href="index.php">PAGE D'ACCUEIL</a></li>

                    </ul>
                </div>
                <div class="menu_sous_genre ligne_separe" id="sous_genre">
                    <div class="sous_genre" data-genre="romans">
                        <ul>
                            <li><a href="aventure.php">Aventure</a></li>
                            <li><a href="fantastique.php">Fantastique</a></li>
                            <li><a href="policier.php">Policier</a></li>
                            <li><a href="romance.php">Romance</a></li>
                            <li><a href="science-fiction.php">Science-Fiction</a></li>
                        </ul>
                    </div>
                    </li>
                    </ul>
                    <ul>
                        <div class="sous_genre" data-genre="db">
                            <ul>
                                <li><a href="bd.php">Aventure</a></li>
                                <li><a href="bd.php">Guerre</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                    <ul>
                        <div class="sous_genre" data-genre="theatre">
                            <ul>
                                <li><a href="theatre.php">Théâtre de l'absurde</a></li>
                                <li><a href="theatre.php">Théâtre de la maturation</a></li>
                                <li><a href="theatre.php">Théâtre initiatique</a></li>
                                <li><a href="theatre.php">Théâtre psychologique</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                    <ul>
                        <div class="sous_genre" data-genre="grandir">
                            <ul>
                                <li><a href="grandir.php">Développement de l'enfant</a></li>
                                <li><a href="grandir.php">Evolution personnelle</a></li>
                                <li><a href="grandir.php">Psychologie du développement</a></li>
                                <li><a href="grandir.php">Récit autobiographique</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                    <ul>
                        <div class="sous_genre" data-genre="essais">
                            <ul>
                                <li><a href="essai.php">Féminisme</a></li>
                                <li><a href="essai.php">Philosophie sociale</a></li>
                                <li><a href="essai.php">Sociologie</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
                <!--class=menu_sous_genre-->
                <p><a href="#" class="bt_fermer"><img src="/img/fermer.png" alt="fermer" onclick="clickMenu()"></a></p>
            </div>
            <!--menu_ul-->
    </nav>
    <script>
    function clickMenu() {
        if (objets.style.display == "block") {
            objets.style.display = "none"
        } else {
            objets.style.display = "block"
        }
    }


    // Obtém a lista de opções de gênero
    const genreOptions = document.querySelectorAll('[data-genre]');

    // Obtém a lista de sous_genre
    const sousGenreList = document.getElementById('sous_genre');

    // Adiciona um evento de clique a cada opção de gênero
    genreOptions.forEach(option => {
        option.addEventListener('click', () => {
            const selectedGenre = option.getAttribute('data-genre');
            // Esconde todas as colunas de sous_genre
            sousGenreList.querySelectorAll('.sous_genre ul').forEach(column => {
                column.style.display = 'none';
            });
            // Mostra apenas a coluna correspondente ao gênero selecionado
            const selectedColumn = sousGenreList.querySelector(`[data-genre="${selectedGenre}"] ul`);
            if (selectedColumn) {
                selectedColumn.style.display = 'flex'
            }
        });
    });
    </script>
</body>

</html>