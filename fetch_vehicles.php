<?php
include 'db_connect.php';

try {
    // Préparer une requête sécurisée pour récupérer les véhicules disponibles
    $query = $pdo->prepare("
        SELECT 
            v.IdVoiture, 
            mv.NomMarque AS marque,
            v.PrixAchat AS prixachat,
            v.PrixLocation AS prix, 
            v.Couleur, 
            v.Photo, 
            v.BoiteVitesse 
        FROM Voiture v
        INNER JOIN MarqueVoiture mv ON v.IdMarque = mv.IdMarque
        WHERE v.IdStatut = 'STAT001' -- Statut 'Disponible'
    ");
    
    $query->execute();

    // Vérifier si des résultats sont retournés
    if ($query->rowCount() > 0) {
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='vehicle'>";

            // Gestion de l'image avec une image par défaut si aucune image n'est fournie
            $imagePath = !empty($row['Photo']) ? "images/" . htmlspecialchars($row['Photo']) : "images/default.jpg";
            echo "<img src='" . $imagePath . "' alt='" . htmlspecialchars($row['marque'] . " voiture disponible") . "'>";
            
            echo "<h3>" . htmlspecialchars($row['marque']) . " - " . htmlspecialchars($row['Couleur']) . "</h3>";
            echo "<p>Prix: " . htmlspecialchars($row['prixachat']) . " €</p>";
            echo "<p>Prix: " . htmlspecialchars($row['prix']) . " € / jour</p>";
            echo "<p>Boîte: " . htmlspecialchars($row['BoiteVitesse']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun véhicule disponible pour le moment.</p>";
    }
} catch (PDOException $e) {
    // Afficher un message d'erreur en cas de problème
    echo "<p>Erreur : Impossible de récupérer les données. Veuillez réessayer plus tard.</p>";
    // Enlever le commentaire pour voir en debug:
    // echo "<p>Détails : " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

