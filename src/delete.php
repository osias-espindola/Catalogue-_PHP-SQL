<?php 
//revérifie qu'il y a bien une ID dans l'URL et que le livre correspondant existe
if (isset($_GET['id']) && !empty($_GET['id'])) 
 {
require_once("connect.php");
$id = strip_tags($_GET["id"]);
$sql = "SELECT * FROM livres WHERE id = :id";
//On prépare la requête dans $sql,donc récupérer l'id unique
$query = $db->prepare($sql);
//on accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(':id', $id, PDO::PARAM_INT);
//exécuter la requête
$query->execute();
//besoin d'une seule donnée donc fetch uniquement et non pas fetchAll
$livre = $query->fetch(); 

//s'il n'y a rien dans $user on redirige vers l'index, on vérifie si l'utilisateur existe dans la BDD
if(!$livre) {
    header('Location: admin.php');
}  else {
//on gère la suppression du livre
$sql = "DELETE FROM livres WHERE id = :id";
$query = $db->prepare($sql);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
header('Location: admin.php');
}

} else { header('Location: admin.php');

} //si ça a foiré avec un mauvais ID ce else là sert à ça
?>