
<?php
//nous allons vérifier la présence de $_POST
if($_POST){ 
    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['first_name']) && !empty($_POST['first_name']) 
        && isset($_POST['last_name']) && !empty($_POST['last_name'])
    ) { //Si ça existe bien on fait en sorte de modifier les données
        require_once('connect.php');
        $id = strip_tags($_POST['id']);
        $first_name = strip_tags($_POST['first_name']);
        $last_name = strip_tags($_POST['last_name']);
        
        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name WHERE id= :id";
        //dans la colone first/last_name met la valeur first/last_name du formulaire

        $query = $db->prepare($sql);

        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":first_name", $first_name, PDO::PARAM_STR); // Correction de frist_name à first_name
        $query->bindValue(":last_name", $last_name, PDO::PARAM_STR);
        $query->execute();
        header("Location: index.php"); 
    } else { 
        echo "remplissez le formulaire";
    }

}
if (isset($_GET['id']) && !empty($_GET['id'])) //si l'id de l'url existe et est rempli
 {
require_once("connect.php");
// echo $_GET["id"];
$id = strip_tags($_GET["id"]);
$sql = "SELECT * FROM users WHERE id = :id";
$query = $db->prepare($sql);
$query->bindValue(':id', $id, PDO::PARAM_INT);

$query->execute();
$user = $query->fetch(); 
if(!$user) {
    header('Location: index.php');
}  else {   require_once("disconnect.php");
}

} else { header('Location: index.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de mise à jour</title>
</head>
<body><title><?= $user['first_name'] . ' ' . $user['last_name'] ?></title>
</head>
<body>
    <h1>Modification de <?= $user['first_name'] . ' ' . $user['last_name'] ?></h1>
<form method="post">  
    <label for="first_name">
        Prénom
    </label>
    <input type="text" name='first_name' value="<?= $user['first_name'] ?>" required>

    <label for="last_name">
        Nom
    </label>
    <input type="text" name='last_name' value="<?= $user['last_name'] ?>" required>
    <input type="hidden" name="id" value="<?= $user['id'] ?>" required>
    <button>Modifier</button>
    </form>
    <a href="index.php">Retour</a> 
    <!-- <?php echo print_r($_POST);?> -->
</body>
</html>
