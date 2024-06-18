<?php
// Inclui o arquivo de conexão com o banco de dados
require_once('connect.php');

// Verifica se o e-mail e a senha foram enviados
if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['mot_de_passe'])) {

    // Verifica se o campo de e-mail está vazio
    if(strlen($_POST['Nom']) == 0) {
        echo "Veuillez saisir votre nom.";
    } else if(strlen($_POST['Prenom']) == 0) {
        echo "Veuillez saisir votre prénom.";
    } else if(strlen($_POST['mot_de_passe']) == 0) {
        echo "Veuillez saisir votre mot de passe.";
    } else {
        // Prepara a consulta SQL para verificar se o usuário existe
        $sql = "SELECT * FROM `admin` WHERE nom = :nom AND prenom = :prenom AND mot_de_passe = :mot_de_passe";
        $stmt = $db->prepare($sql);

        // Vincula os parâmetros ao valor real enviado pelo usuário
        $stmt->bindParam(':nom', $_POST['Nom']);
        $stmt->bindParam(':prenom', $_POST['Prenom']);
        $stmt->bindParam(':mot_de_passe', $_POST['mot_de_passe']);

        // Executa a consulta
        $stmt->execute();

        // Verifica se encontrou um usuário
        if($stmt->rowCount() == 1) {
            // Obtém os dados do usuário
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            // Inicia a sessão se ainda não foi iniciada
            if(!isset($_SESSION)) {
                session_start();
            }
            // Armazena o ID e o nome do usuário na sessão
            $_SESSION['id'] = $admin['id'];
            $_SESSION['nom'] = $admin['nom'];
            $_SESSION['prenom'] = $admin['prenom'];

            // Redireciona para a página do usuário
            header("Location: admin.php");
            exit; // Encerra a execução do script
        } else {
            // Mensagem de erro se o login falhar
            echo "Échec de la connexion, e-mail ou mot de passe incorrects";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Conncetion Administration</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="login-container flex_form" >
        <form action="" method="post">
            <h2>Login</h2>

            <label for="Nom">Nom</label>
           
            <input type="text" name="Nom" placeholder="Nom" required >

            <label>Prenom</label>
           
            <input type="text" name="Prenom" placeholder="Prenom" required >

            <label>Mot de passe</label>
            <!-- Corrigido o tipo do input para password e o nome do campo -->
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required >

            <button type="submit">Connecter</button>
            
            <!-- Corrigido o texto para francês -->
            <p class="message">Je ne suis pas inscrit <a href="form_user.php">Créer un compte</a></p>
        </form>
    </div>
</body>
</html>
