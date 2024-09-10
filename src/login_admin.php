<?php
session_start();
require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = strip_tags($_POST['nom']);
    $prenom = strip_tags($_POST['prenom']);
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM admin WHERE prenom = :prenom";
    $query = $db->prepare($sql);
    $query->bindParam(':prenom', $prenom);
    $query->execute();
    $admin = $query->fetch();

    if ($admin && password_verify($mot_de_passe, $admin["mot_de_passe"])) {
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center flex-column vh-100">
        <div class="login-container p-4 shadow rounded w-100" style="max-width: 400px;">
            <form action="" method="post" class="w-100">
                <h2 class="text-center">Login</h2>

                <?php if (!empty($_SESSION["message"])): ?>
                    <p class="text-danger"><?php echo $_SESSION["message"]; ?></p>
                    <?php unset($_SESSION["message"]); ?>
                <?php endif; ?>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe</label>
                    <input type="password" class="form-control" name="mot_de_passe" placeholder="Mot de passe" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Connecter</button>
                <p class="message mt-3 text-center">Je ne suis pas inscrit <a href="inscription.php">Créer un compte</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>