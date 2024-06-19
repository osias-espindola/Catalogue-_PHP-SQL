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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style_nav.css">
    <title>nav barra</title>
</head>
<body>
<nav>
    <div class=nav_barra>
        <div class= "logo_nav">
            <img  src="/img/Logo05.png" alt="" class="logo">
            <div class="page_name">
                <p>Le coin de littérature</p>
            </div>
        </div>
        
        <div class= "recherche">
            <input type="text" name= "recherche" id= "recherche" placeholder= "  Faire une recherche">
            <button type="submit" class="loupe"><img src="/img/loupe.png" alt="Pesquisar" ></button>
        </div>
        <div class="icon">
        
            <div class="user">
                <img  src="/img/user.png" alt="">
            </div>
            <div class="panier">
                <img  src="/img/panier.png" alt="">
            </div>
            <div class= "menuBurger">
                <img  src="/img/menuBurger.png" alt="" onclick= "clickMenu()">
                <!-- <span  id= "burger" class="material-symbols-outlined" onclick= "clickMenu()">menu</span> -->
            </div>     
        </div>  
    </div>
    <div class= >
        <div class="menu_fixe ">
            <ul>
                <li><a href="#">ROMANS</a></li>
                <li><a href="#">DB</a></li> 
                <li><a href="#">THÉÂTRE</a></li>
                <li><a href="#">GRANDIR</a></li>
                <li><a href="#">ESSAIS</a></li>
             </ul>
        </div>
    <div class="menu_ul" id="objets">
        <div class="menu_genre ligne_separe">
            <ul>
                <li data-genre="romans"><a href="page_genre.php">ROMANS</a></li>
                <li data-genre="db"><a href="page_genre.php">DB</a></li> 
                <li data-genre="theatre"><a href="page_genre.php">THEATRE</a></li>
                <li data-genre="grandir"><a href="page_genre.php">GRANDIR</a></li>
                <li data-genre="essais"><a href="page_genre.php">ESSAIS</a></li>
             </ul>
        </div>
        <div class= "ligne_separe">
            <ul>
                <li data-genre="page_d_acuueil"><a href="#">PAGE D'ACCUEIL</a></li>
                <li data-genre="nouveautes"><a href="#">NOUVEAUTES</a></li>
            </ul>
        </div>  
        <div class= "menu_sous_genre ligne_separe" id="sous_genre">
                    <div class="sous_genre" data-genre="romans" >
                        <ul>
                            <li><a href="">Aventure</a></li>
                            <li><a href="">Fantastique</a></li>
                            <li><a href="">Policier</a></li>
                            <li><a href="">Romance</a></li>
                            <li><a href="">Science-Fiction</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul>      
                    <div class="sous_genre" data-genre="db">
                        <ul>
                            <li><a href="">Aventure</a></li>
                            <li><a href="">Guerre</a></li>
                        </ul>
                    </div>
                </li> 
            </ul>
            <ul>                 
                        <div class="sous_genre" data-genre="theatre">
                            <ul>
                                <li><a href="">Théâtre de l'absurde</a></li>
                                <li><a href="">Théâtre de la maturation</a></li>
                                <li><a href="">Théâtre initiatique</a></li>
                                <li><a href="">Théâtre psychologique</a></li>
                            </ul>
                        </div>
                    </li>
            </ul>
            <ul>         
                        <div class="sous_genre" data-genre="grandir">
                            <ul>
                                <li><a href="">Développement de l'enfant</a></li>
                                <li><a href="">Evolution personnelle</a></li>
                                <li><a href="">Psychologie du développement</a></li>
                                <li><a href="">Récit autobiographique</a></li>
                            </ul>
                        </div>
                    </li>
             </ul>
             <ul>       
                    <div class="sous_genre" data-genre="essais">
                        <ul>
                            <li><a href="">Féminisme</a></li>
                            <li><a href="">Philosophie sociale</a></li>
                            <li><a href="">Sociologie</a></li>
                        </ul>
                    </div>
                </li>
             </ul>
        </div> <!--class=menu_sous_genre-->
        <p ><a href="#" class="bt_fermer"><img src="/img/fermer.png" alt="fermer"  onclick= "clickMenu()"></a></p>
    </div> <!--menu_ul-->
</nav>  
<script>
    function clickMenu() {
        if (objets.style.display == "block") {
            objets.style.display = "none"
        } else{
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