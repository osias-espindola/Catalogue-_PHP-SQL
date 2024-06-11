<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: arial;
        }
        .footer {
            height: 400px;
        }
        .bg-footer {
            padding: 20px;
            background-color: #213447;
            height: 150px;
            
            font-size: 3rem;
            color: white;
        }

        .footer-text {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        
        .footer-text-margin {
            margin: 20px;
        }

        @media screen and (max-width: 350px) {
            .footer-text {
                flex-direction: column;
                align-items: center; 
                text-align: center;
            .footer-text-margin {
                margin: 10px 0;
            }
        }
    }

        </style>
</head>
<body>
    <footer>
        <div class="footer">
            <div class="bg-footer">
                <p>Le coin<br>de littérature</p>
            </div>
            <div class="footer-text">
                <div class="footer-text-margin"><p>Plan du site</p></div>
                <div class="footer-text-margin"><p>CGV</p></div>
                <div class="footer-text-margin"><p>Conditions d'utilisation</p></div>
                <div class="footer-text-margin"><p>Politique de confidentialité</p></div>
                <div class="footer-text-margin"><p>Services</p></div>
            </div>
        </div>
    </footer>
</body>
</html>