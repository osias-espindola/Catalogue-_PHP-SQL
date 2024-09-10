<?php
session_start();
require_once('connect.php');

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage et validation des entrées
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mot_de_passe = $_POST['mot_de_passe']; // Le mot de passe ne doit pas être échappé pour le hachage

    // Vérification si le prénom est déjà utilisé
    $sql = "SELECT * FROM admin WHERE prenom = :prenom";
    $query = $db->prepare($sql);
    $query->bindParam(':prenom', $prenom);
    $query->execute();
    $admin = $query->fetch();

    if ($admin) {
        $_SESSION["message"] = "Le prénom est déjà utilisé.";
    } else {
        // Hachage du mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $sql = "INSERT INTO admin (nom, prenom, mot_de_passe) VALUES (:nom, :prenom, :mot_de_passe)";
        $query = $db->prepare($sql);
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':mot_de_passe', $hashed_password);

        if ($query->execute()) {
            $_SESSION["message"] = "Compte créé avec succès. Vous pouvez maintenant vous connecter.";
            header("Location: login_admin.php");
            exit();
        } else {
            $_SESSION["message"] = "Erreur lors de la création du compte. Veuillez réessayer.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un compte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center flex-column vh-100">
        <div class="login-container p-4 shadow rounded w-100" style="max-width: 400px;">
            <form action="" method="post" class="w-100">
            <h2 class="text-center">Créer un compte</h2>

            <?php if (!empty($_SESSION["message"])): ?>
                <p class="text-danger"><?php echo htmlspecialchars($_SESSION["message"], ENT_QUOTES, 'UTF-8'); ?></p>
                <?php unset($_SESSION["message"]); ?>
            <?php endif; ?>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block"">Créer un compte</button>
            <p class="message mt-3 text-center">Déjà inscrit ? <a href="login_admin.php">Connectez-vous ici</a></p>
        </form>
    </div>
</body>
</html>