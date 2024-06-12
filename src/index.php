<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        h1 {
            font-size: 4rem;
        }

        @media screen and (max-width: 600px){
            h1 {
                font-size: 2rem;
            }
        }

        .header {
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 550px;
            background-image: url("img/bibliotheque.png");
            background-position: bottom;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 0px 5px 5px black;
            color: white;
            text-shadow: 0px 0px 10px black;
        }



    </style>
</head>
<body>
    <section1>
        <div class="header">
            <h1>Bienvenue au coin<br>
            de littérature<br><br>Bonne visite</h1>

        </div>
    </section>
    <section2>

    </section>
    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
</body>
</html>