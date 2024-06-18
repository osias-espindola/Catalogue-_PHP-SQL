<?php

// Démarrage de la session
if (!isset($_SESSION)) {
    session_start();
}

// Destruction de la session
session_destroy();

// Redirection vers la page d'accueil avec un message de confirmation
$_SESSION['message'] = "Vous vous êtes bien déconnecté";
header('Location: login_admin.php');
exit();

?>