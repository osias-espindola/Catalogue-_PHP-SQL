<?php

session_start();

require_once('connect.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strip_tags($_POST['nom']);
    $prenom = strip_tags($_POST['prenom']);
    $mot_de_passe = $_POST['mot_de_passe'];


        // Requête pour sélectionner l'administrateur par son prénom
        $sql = "SELECT * FROM admin WHERE prenom = :prenom";
        $query = $db->prepare($sql);
        $query->bindParam(':prenom', $prenom);
        $query->execute();
        $admin = $query->fetch();

        if ($admin && $mot_de_passe === $admin["mot_de_passe"]) {
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["prenom"] = $prenom;
            header("Location: admin.php");
            exit();
        } else {
            $_SESSION["message"] = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
        
       
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administration</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="login-container flex_form">
        <form action="" method="post">
            <h2>Login</h2>

            <?php if (!empty($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <label for="nom">Nom</label>
            <input type="text" name="nom" placeholder="Nom" required>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" placeholder="Prénom" required>

            <label for="mot_de_passe">Mot de passe</label>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

            <button type="submit">Connecter</button>
            <p class="message">Je ne suis pas inscrit <a href="form_user.php">Créer un compte</a></p>
        </form>
    </div>
</body>
</html>