<?php
// Inclure le fichier de connexion à la base de données
require_once('connect.php');

try {
    // Sélectionner tous les administrateurs
    $sql = "SELECT id, mot_de_passe FROM admin";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($admins as $admin) {
        // Vérifier si le mot de passe n'est pas déjà haché
        if (!password_verify($admin['mot_de_passe'], PASSWORD_DEFAULT)) {
            // Hacher le mot de passe
            $hashedPassword = password_hash($admin['mot_de_passe'], PASSWORD_DEFAULT);

            // Mettre à jour le mot de passe haché dans la base de données
            $updateSql = "UPDATE admin SET mot_de_passe = :mot_de_passe WHERE id = :id";
            $updateStmt = $db->prepare($updateSql);
            $updateStmt->bindParam(':mot_de_passe', $hashedPassword);
            $updateStmt->bindParam(':id', $admin['id']);
            $updateStmt->execute();
        }
    }

    echo "Mots de passe hachés et mis à jour.";
} catch (PDOException $e) {
    echo "Erreur de mise à jour des mots de passe : " . $e->getMessage();
}
?>