<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    $_SESSION["message"] = "Vous devez être connecté pour accéder à cette page";
    header("Location: login_admin.php");
    exit();
}

require_once("connect.php");

$livre = null; // Initialisation de $livre à null pour éviter les erreurs

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["id"]) && !empty($_POST["id"]) &&
        isset($_POST["titre"]) && !empty($_POST["titre"]) &&
        isset($_POST["auteur"]) && !empty($_POST["auteur"]) &&
        isset($_POST["bio"]) && !empty($_POST["bio"]) &&
        isset($_POST["publication"]) && !empty($_POST["publication"]) &&
        isset($_POST["genre"]) && !empty($_POST["genre"]) &&
        isset($_POST["sous_genre"]) && !empty($_POST["sous_genre"]) &&
        isset($_POST["resume"]) && !empty($_POST["resume"]) &&
        isset($_POST["prix"]) && !empty($_POST["prix"]) &&
        isset($_POST["image_path"]) && !empty($_POST["image_path"])
    ) {
        $id = strip_tags($_POST["id"]);
        $titre = strip_tags($_POST["titre"]);
        $auteur = strip_tags($_POST["auteur"]);
        $bio = strip_tags($_POST["bio"]);
        $publication = strip_tags($_POST["publication"]);
        $genre = strip_tags($_POST["genre"]);
        $sous_genre = strip_tags($_POST["sous_genre"]);
        $resume = strip_tags($_POST["resume"]);
        $prix = strip_tags($_POST["prix"]);
        $image_path = strip_tags($_POST["image_path"]);

        

        // Préparer la requête SQL pour mettre à jour le livre
        $sql = "UPDATE livres SET titre = :titre, auteur = :auteur, bio = :bio, publication = :publication, genre = :genre, sous_genre = :sous_genre, resume = :resume, prix = :prix, image = :image WHERE id = :id";

        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->bindParam(':titre', $titre, PDO::PARAM_STR);
        $query->bindParam(':auteur', $auteur, PDO::PARAM_STR);
        $query->bindParam(':bio', $bio, PDO::PARAM_STR);
        $query->bindParam(':publication', $publication, PDO::PARAM_STR);
        $query->bindParam(':genre', $genre, PDO::PARAM_STR);
        $query->bindParam(':sous_genre', $sous_genre, PDO::PARAM_STR);
        $query->bindParam(':resume', $resume, PDO::PARAM_STR);
        $query->bindParam(':prix', $prix, PDO::PARAM_STR);
        $query->bindParam(':image', $image_path, PDO::PARAM_STR);

        if ($query->execute()) {
            $_SESSION["message"] = "Livre mis à jour avec succès.";
            header("Location: admin.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
} else {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = strip_tags($_GET["id"]);

        $sql = "SELECT * FROM livres WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $livre = $query->fetch(PDO::FETCH_ASSOC);

        if (!$livre) {
            $_SESSION["message"] = "Livre non trouvé.";
            header("Location: admin.php");
            exit();
        }
    } else {
        $_SESSION["message"] = "Identifiant de livre non spécifié.";
        header("Location: admin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <link rel="stylesheet" href="navAdmin.css">

    <title>Modifier le livre</title>
</head>
<body>

<?php include 'nav_admin.php'; ?>

   <h1>Modifier <?= htmlspecialchars($livre["titre"]) ?></h1>

   <div class="formUpdate">
    <div class="left-column">
        <img src="<?=$livre['image']?>" class="taille2" alt="<?=$livre['titre']?>">
    </div>
    <div class="right-column">
    <div class="form-container">
        <form class="connexion" method="post">
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
            </div>
            <div class="form">
                <div>
                    <label for="sous_genre">Sous-genre</label>
                    <select name="sous_genre" required>
                        <option value="Anthropologie" <?= ($livre["sous_genre"] === "Anthropologie") ? "selected" : "" ?>>Anthropologie</option>
                        <option value="Aventure" <?= ($livre["sous_genre"] === "Aventure") ? "selected" : "" ?>>Aventure</option>
                        <option value="Critique sociale" <?= ($livre["sous_genre"] === "Critique sociale") ? "selected" : "" ?>>Critique sociale</option>
                        <option value="Développement de l'enfance" <?= ($livre["sous_genre"] === "Développement de l'enfance") ? "selected" : "" ?>>Développement de l'enfance</option>
                        <option value="Études postcoloniales" <?= ($livre["sous_genre"] === "Études postcoloniales") ? "selected" : "" ?>>Études postcoloniales</option>
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
                    <label for="image_path">Chemin de l'Image</label>
                    <input type="text" name="image_path" value="<?= htmlspecialchars($livre["image"]) ?>" required>
                </div>
                
                <input type="hidden" name="id" value="<?= $livre["id"] ?>">
                <button type="submit">Modifier</button>
            </div>
        </form>
    </div>
</div>
</div>


    <a href="admin.php"><button class="retour">Retour</button></a>

</body>
</html>