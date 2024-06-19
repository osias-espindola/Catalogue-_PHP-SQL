<?php
session_start();

//Vérifie si l'utilisateur est connecté
if (!isset($_SESSION["admin_id"])) {
    // Rediriger l'utilisateur vers la page de connexion
    $_SESSION["message"] = "Vous devez être connecté pour accéder à cette page";
    header("Location: login_admin.php");
    exit();
}

require_once("connect.php");

// Vérifie si le formulaire a été soumis en POST
if($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id"]) && !empty($_POST["id"])
        && isset($_POST["titre"]) && !empty($_POST["titre"])
        && isset($_POST["auteur"]) && !empty($_POST["auteur"])
        && isset($_POST["bio"]) && !empty($_POST["bio"])
        && isset($_POST["publication"]) && !empty($_POST["publication"])
        && isset($_POST["genre"]) && !empty($_POST["genre"])
        && isset($_POST["sous_genre"]) && !empty($_POST["sous_genre"])
        && isset($_POST["resume"]) && !empty($_POST["resume"])
        && isset($_POST["prix"]) && !empty($_POST["prix"])
        && isset($_POST["image"]) && !empty($_POST["image"]))
    {
        $id = strip_tags($_POST["id"]);
        $titre = strip_tags($_POST["titre"]);
        $auteur = strip_tags($_POST["auteur"]);
        $bio = strip_tags($_POST["bio"]);
        $publication = strip_tags($_POST["publication"]);
        $genre = strip_tags($_POST["genre"]);
        $sous_genre = strip_tags($_POST["sous_genre"]);
        $resume = strip_tags($_POST["resume"]);
        $prix = strip_tags($_POST["prix"]);
        $image = strip_tags($_POST["image"]);

        // Gestion du téléversement de l'image
        $target_dir = "uploads/";
        $image = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
            // Image uploadée avec succès
        } else {
            echo "Désolé, une erreur s'est produite lors du téléversement de votre fichier.";
            exit();
        }

        $sql = "UPDATE livres SET titre = :titre, auteur = :auteur,
        bio = :bio, publication = :publication, genre = :genre, sous_genre = :sous_genre, resume = :resume, prix = :prix, image = :image WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":titre", $titre, PDO::PARAM_STR);
        $query->bindValue(":auteur", $auteur, PDO::PARAM_STR);
        $query->bindValue(":bio", $bio, PDO::PARAM_STR);
        $query->bindValue(":publication", $publication, PDO::PARAM_STR);
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);
        $query->bindValue(":sous_genre", $sous_genre, PDO::PARAM_STR);
        $query->bindValue(":resume", $resume, PDO::PARAM_STR);
        $query->bindValue(":prix", $prix, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);

        $query->execute();
        // header("Location: admin.php");
        exit();
    } else {
        echo "Remplissez le formulaire";
    }
}

// Vérifie si l'ID du titre est passé en paramètre dans l'URL
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = strip_tags($_GET["id"]);

    $sql = "SELECT id, titre, auteur, bio, publication, genre, sous_genre, resume, prix, image
        FROM livres WHERE id = :id";
    $query = $db->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $livre = $query->fetch();

    // Vérifie si l'titre existe
    if (!$livre) {
        header("Location: admin.php");
        exit();
    }
} else {
    // Redirige l'utilisateur vers la page admin.php s'il manque l'ID de l'titre dans l'URL
    header("Location: admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Modifier le livre</title>
</head>
<body>

   <h1>Modifier <?= htmlspecialchars($livre["titre"]) ?></h1>
    
    <form class="connexion" method="post" enctype="multipart/form-data">
        <div class="form">
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" value="<?= htmlspecialchars($livre["titre"]) ?>" required>
            </div>
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" value="<?= htmlspecialchars($livre["auteur"]) ?>" required>
            </div>
            <div>
                <label for="bio">Biographie</label>
                <textarea name="bio" required><?= htmlspecialchars($livre["bio"]) ?></textarea>
            </div>
            <div>
                <label for="publication">Publication</label>
                <input type="date" name="publication" value="<?= htmlspecialchars($livre["publication"]) ?>" required>
            </div>
            <div>
            <label for="genre">Genre</label>
    <select name="genre" required>
        <option value="Roman" <?= ($livre["genre"] === "Roman") ? "selected" : "" ?>>Roman</option>
        <option value="Bande dessinée" <?= ($livre["genre"] === "Bande dessinée") ? "selected" : "" ?>>Bande dessinée</option>
        <option value="Théâtre" <?= ($livre["genre"] === "Théâtre") ? "selected" : "" ?>>Théâtre</option>
        <option value="Grandir" <?= ($livre["genre"] === "Grandir") ? "selected" : "" ?>>Grandir</option>
        <option value="Essai" <?= ($livre["genre"] === "Essai") ? "selected" : "" ?>>Essai</option>
    </select>
            </div>
            <div>
            <label for="sous_genre">Sous-genre</label>
    <select name="sous_genre" required>
        <option value="Anthropologie" <?= ($livre["sous_genre"] === "Anthropologie") ? "selected" : "" ?>>Anthropologie</option>
        <option value="Aventure" <?= ($livre["sous_genre"] === "Aventure") ? "selected" : "" ?>>Aventure</option>
        <option value="Critique sociale" <?= ($livre["sous_genre"] === "Critique sociale") ? "selected" : "" ?>>Critique sociale</option>
        <option value="Développement de l'enfance" <?= ($livre["sous_genre"] === "Développement de l'enfance") ? "selected" : "" ?>>Développement de l'enfance</option>
        <option value="Études postcoloniales" <?= ($livre["sous_genre"] === "Études postcoloniales") ? "selected" : "" ?>>Études postcoloniales</option>
        <option value="Évolution personnelle" <?= ($livre["sous_genre"] === "Évolution personnelle") ? "selected" : "" ?>>Évolution personnelle</option>
        <option value="Fantastique" <?= ($livre["sous_genre"] === "Fantastique") ? "selected" : "" ?>>Fantastique</option>
        <option value="Féminisme" <?= ($livre["sous_genre"] === "Féminisme") ? "selected" : "" ?>>Féminisme</option>
        <option value="Guerre" <?= ($livre["sous_genre"] === "Guerre") ? "selected" : "" ?>>Guerre</option>
        <option value="Philosophie sociale" <?= ($livre["sous_genre"] === "Philosophie sociale") ? "selected" : "" ?>>Philosophie sociale</option>
        <option value="Policier" <?= ($livre["sous_genre"] === "Policier") ? "selected" : "" ?>>Policier</option>
        <option value="Psychologie du développement" <?= ($livre["sous_genre"] === "Psychologie du développement") ? "selected" : "" ?>>Psychologie du développement</option>
        <option value="Récit autobiographique" <?= ($livre["sous_genre"] === "Récit autobiographique") ? "selected" : "" ?>>Récit autobiographique</option>
        <option value="Romance" <?= ($livre["sous_genre"] === "Romance") ? "selected" : "" ?>>Romance</option>
        <option value="Science-Fiction" <?= ($livre["sous_genre"] === "Science-Fiction") ? "selected" : "" ?>>Science-Fiction</option>
        <option value="Sociologie" <?= ($livre["sous_genre"] === "Sociologie") ? "selected" : "" ?>>Sociologie</option>
        <option value="Théâtre de l'absurde" <?= ($livre["sous_genre"] === "Théâtre de l'absurde") ? "selected" : "" ?>>Théâtre de l'absurde</option>
        <option value="Théâtre de la maturation" <?= ($livre["sous_genre"] === "Théâtre de la maturation") ? "selected" : "" ?>>Théâtre de la maturation</option>
        <option value="Théâtre initiatique" <?= ($livre["sous_genre"] === "Théâtre initiatique") ? "selected" : "" ?>>Théâtre initiatique</option>
        <option value="Théâtre psychologique" <?= ($livre["sous_genre"] === "Théâtre psychologique") ? "selected" : "" ?>>Théâtre psychologique</option>
    </select>
            </div>
            <div>
                <label for="resume">Résumé</label>
                <textarea name="resume" required><?= htmlspecialchars($livre["resume"]) ?></textarea>
            </div>
            <div>
                <label for="prix">Prix</label>
                <input type="text" name="prix" value="<?= htmlspecialchars($livre["prix"]) ?>" required>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <input type="hidden" name="id" value="<?= $livre["id"] ?>">
            <button type="submit" class="modif">Modifier</button>
        </div>
    </form>

    <a href="admin.php"><button class="retour">Retour</button></a>

</body>
</html>