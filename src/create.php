<?php
// session_start();

// // Vérification de la connexion de l'utilisateur
// if (!isset($_SESSION["user_id"])) {
//     // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
//     header("Location: login.php");
//     exit();
// }

require_once("connect.php");

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validation des données du formulaire
    $titre = isset($_POST["titre"]) ? htmlspecialchars($_POST["titre"]) : "";
    $auteur = isset($_POST["auteur"]) ? htmlspecialchars($_POST["auteur"]) : "";
    $bio = isset($_POST["bio"]) ? htmlspecialchars($_POST["bio"]) : "";
    $publication = isset($_POST["publication"]) ? htmlspecialchars($_POST["publication"]) : "";
    $genre = isset($_POST["genre"]) ? htmlspecialchars($_POST["genre"]) : "";
    $sous_genre = isset($_POST["sous_genre"]) ? htmlspecialchars($_POST["sous_genre"]) : "";
    $resume = isset($_POST["resume"]) ? htmlspecialchars($_POST["resume"]) : "";
    $prix = isset($_POST["prix"]) ? htmlspecialchars($_POST["prix"]) : "";
    $image = isset($_POST["image"]) ? htmlspecialchars($_POST["image"]) : "";

    // Vérification des champs obligatoires
    if (empty($titre) || empty($auteur) || empty($bio) || empty($publication) || empty($genre) || empty($sous_genre) || empty($resume) || empty($prix) || empty($image)) {
        $_SESSION["error"] = "Veuillez remplir tous les champs.";
    } else {
        // Insertion des données dans la base de données
        $sql = "INSERT INTO livres (user_id, titre, auteur, bio, publication, genre, sous_genre, resume, prix, image) 
                VALUES (:user_id, :titre, :auteur, :bio, :publication, :genre, :sous_genre, :resume, :prix, :image)";
        $query = $db->prepare($sql);
        $query->bindParam(":user_id", $_SESSION["user_id"]);
        $query->bindParam(":titre", $titre);
        $query->bindParam(":auteur", $auteur);
        $query->bindParam(":bio", $bio);
        $query->bindParam(":publication", $publication);
        $query->bindParam(":genre", $genre);
        $query->bindParam(":sous_genre", $sous_genre);
        $query->bindParam(":resume", $resume);
        $query->bindParam(":prix", $prix);
        $query->bindParam(":image", $image);

        if ($query->execute()) {
            $_SESSION["message"] = "titre ajoutée avec succès.";
            header("Location: admin.php");
            exit();
        } else {
            $_SESSION["error"] = "Une erreur s'est produite lors de l'ajout d'un'titre.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Ajouter un livre</title>
</head>

<body>
    <h1>Ajouter un livre</h1>
    
    <?php if(isset($_SESSION["error"])): ?>
        <div class="error"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></div>
    <?php endif; ?>
    
    <form class="connexion" action="create.php" method="post">
        <div class="form">
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" required>
            </div>
            <div>
                <label for="auteur">Auteur</label>
                <input type="text" name="auteur" required>
            </div>
            
            <div>
                <label for="publication">Publication</label>
                <input type="auteur" name="publication" required>
            </div>
            <div>
                <div><label for="genre">Type</label>
                        <select type="text" name="genre" value="<?=$livres["genre"]?>" required></div>
                        <option value="Roman">Roman</option>
                        <option value="Bande déssinée">Bande déssinée</option>
                        <option value="Téâtre">Théâtre</option>
                        <option value="Grandir">Grandir</option>
                        <option value="Essai">Essai</option>
                    </select>
                </div>
                <div><label for="sous_genre">Type</label>
                        <select type="text" name="sous-genre" value="<?=$livres["sous_genre"]?>" required></div>
                        <option value="Anthropologie">Anthropologie</option>
                        <option value="Aventure">Aventure</option>
                        <option value="Critique sociale">Critique sociale</option>
                        <option value="Développement de l'enfance">Développement de l'enfance</option>
                        <option value="Études postcoloniales">Études postcoloniales</option>
                        <option value="Evolution personnelle">Evolution personnelle</option>
                        <option value="Fantastique">Fantastique</option>
                        <option value="Féminisme">Féminisme</option>
                        <option value="Guerre">Guerre</option>
                        <option value="Philosophie sociale">Philosophie sociale</option>
                        <option value="Policier">Policier</option>
                        <option value="Psychologie du développement">Psychologie du développement</option>
                        <option value="Récit autobiographique">Récit autobiographique</option>
                        <option value="Romance">Romance</option>
                        <option value="Science-Fiction">Science-Fiction</option>
                        <option value="Sociologie">Sociologie</option>
                        <option value="Théâtre de l'absurde">Théâtre de l'absurde</option>
                        <option value="Théâtre de la maturation">Théâtre de la maturation</option>
                        <option value="Théâtre initiatique">Théâtre initiatique</option>
                        <option value="Théâtre psychologique">Théâtre psychologique</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="resume">Résumé</label>
                <input type="text" name="resume" required>
            </div>
            <div>
                <label for="prix">Prix</label>
                <input type="text" name="prix" required>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="blob" name="image" required>
            </div>
            <div>
     
            <button class="ajouter">Ajouter</button>
        </div>
    </form>

    <a href="admin.html"><button class="retour">Retour</button></a>
</body>
</html>