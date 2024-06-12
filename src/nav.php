<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="style_nav.css">
    <title>Document</title>
</head>
<body>
<nav>
    <div class=nav_barra>
        <div class= "logo_nav">
            <img  src="/img/Logo05.png" alt="" class="logo">
        </div>
        <div class= "recherche">

            <input type="text" name= "" id= "" placeholder= "  Faire une recherche">
        </div>
        <div class="icon">
        
            <img  src="/img/user.png" alt="">
            <img  src="/img/panier.png" alt="">
            <img  src="/img/menuBurger.png" alt="" onclick= "clickMenu()">
            <!-- <span  id= "burger" class="material-symbols-outlined" onclick= "clickMenu()">menu</span> -->
        </div>
    </div>
    <div class="menu_ul" id="objets">
        <ul>
            <li><a href="#">ROMANS</a></li>
            <li><a href="#">DB</a></li> 
            <li><a href="#">THEATRE</a></li>
            <li><a href="#">GRANDIR</a></li>
            <li><a href="#">ESSAIS</a></li>
        </ul>

        <div>
            <ul>
                <li><a href="#">PAGE D'ACCUEIL</a></li>
                <li><a href="#">NOUVEAUTES</a></li>
            </ul>
        </div>  
        <div >
            <ul class="flex_col">
                <li><a href="#">Aventures</a></li>
                <li><a href="#">Policier</a></li>
                <li><a href="#">Fantastic</a></li>
                <li><a href="#">Science fiction</a></li>
                <li><a href="#">Amour</a></li>
                
            </ul>
        </div>
    </div>
</nav>  
<script>
    function clickMenu() {
        if (objets.style.display == "block") {
            objets.style.display = "none"
        } else{
            objets.style.display = "block"
        }
    }
</script>
</body>
</html>