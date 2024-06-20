<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login_admin.php");
    exit();
}

require_once("connect.php");

$admin_id = $_SESSION["admin_id"];  // Ajout de l'admin_id depuis la session

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

    // Vérification des champs obligatoires
    if (empty($titre) || empty($auteur) || empty($bio) || empty($publication) || empty($genre) || empty($sous_genre) || empty($resume) || empty($prix) || empty($_FILES["image"]["name"])) {
        $_SESSION["error"] = "Veuillez remplir tous les champs.";
    } else {
        // Définir le chemin du répertoire en fonction du genre sélectionné
        $uploadDir = './Images/' . $sous_genre . '/'; // Chemin relatif au dossier de votre projet où stocker les images
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Vérifie si le répertoire existe, sinon le créer
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Vérifie si le fichier a été correctement téléchargé
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Insertion des données dans la base de données
            $imagePath = $uploadDir . basename($_FILES['image']['name']); // Chemin relatif de l'image
            $sql = "INSERT INTO livres (admin_id, titre, auteur, bio, publication, genre, sous_genre, resume, prix, image) 
                    VALUES (:admin_id, :titre, :auteur, :bio, :publication, :genre, :sous_genre, :resume, :prix, :image)";
            $query = $db->prepare($sql);
            $query->bindParam(":admin_id", $admin_id);
            $query->bindParam(":titre", $titre);
            $query->bindParam(":auteur", $auteur);
            $query->bindParam(":bio", $bio);
            $query->bindParam(":publication", $publication);
            $query->bindParam(":genre", $genre);
            $query->bindParam(":sous_genre", $sous_genre);
            $query->bindParam(":resume", $resume);
            $query->bindParam(":prix", $prix);
            $query->bindParam(":image", $imagePath);

            if ($query->execute()) {
                $_SESSION["message"] = "Titre ajouté avec succès.";
                header("Location: admin.php");
                exit();
            } else {
                $_SESSION["error"] = "Une erreur s'est produite lors de l'ajout du titre.";
            }
        } else {
            $_SESSION["error"] = "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="crud.css">
    <link rel="stylesheet" href="navAdmin.css">


    <title>Ajouter un livre</title>
</head>

<body>

<?php include 'nav_admin.php'; ?>
    <h1>Ajouter un livre</h1>
    
    <?php if(isset($_SESSION["error"])): ?>
        <div class="error"><?php echo $_SESSION["error"]; unset($_SESSION["error"]); ?></div>
    <?php endif; ?>
    <div class="formUpdate">
    <div class="right-column">
    <form class="connexion" action="create.php" method="post" enctype="multipart/form-data">
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
                <label for="bio">Biographie</label>
                <input type="text" name="bio" required>
            </div>
            
            <div>
                <label for="publication">Publication</label>
                <input type="date" name="publication" required>
            </div>
        
            <div>
                <label for="genre">Genre</label>
                <select name="genre" required>
                    <option value="Roman">Roman</option>
                    <option value="Bande dessinée">Bande dessinée</option>
                    <option value="Théâtre">Théâtre</option>
                    <option value="Grandir">Grandir</option>
                    <option value="Essai">Essai</option>
                </select>
            </div>
        </div>
        <div class="form">
            <div>
                <label for="sous_genre">Sous-genre</label>
                <select name="sous_genre" required>
                    <option value="Anthropologie">Anthropologie</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Critique sociale">Critique sociale</option>
                    <option value="Développement de l'enfance">Développement de l'enfance</option>
                    <option value="Études postcoloniales">Études postcoloniales</option>
                    <option value="Évolution personnelle">Évolution personnelle</option>
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
                <input type="file" name="image" required>
            </div>
            <div>
                <button class="ajouter" type="submit">Ajouter</button>
            </div>
        </div>
    </form>
    </div>
    </div>

    <a href="admin.php"><button class="retour">Retour</button></a>
</body>
</html>