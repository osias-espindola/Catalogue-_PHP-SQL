<?php
require_once('connect.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT `image` FROM `livres` WHERE `id` = :id";
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $image = $query->fetch(PDO::FETCH_ASSOC);

    if ($image) {
        header("Content-Type: image/jpeg"); // Utilisez un type MIME par défaut
        echo $image['image'];
    } else {
        echo "Image not found for ID: $id";
    }
} else {
    echo "No image ID specified.";
}
?>