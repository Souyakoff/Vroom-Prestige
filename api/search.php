<?php
require_once '../config/database.php';

header('Content-Type: application/json');

try {
    $conditions = ['v.IdStatut = :status'];
    $params = [':status' => 'STAT001'];

    // Brand filter
    if (!empty($_GET['marque'])) {
        $conditions[] = 'v.IdMarque = :marque';
        $params[':marque'] = $_GET['marque'];
    }

    // Type filter
    if (!empty($_GET['type'])) {
        $conditions[] = 'v.IdType = :type';
        $params[':type'] = $_GET['type'];
    }

    // Price filter
    if (!empty($_GET['prix_max'])) {
        $conditions[] = 'v.PrixLocation <= :prix_max';
        $params[':prix_max'] = $_GET['prix_max'];
    }

    // Year filter
    if (!empty($_GET['annee_min'])) {
        $conditions[] = 'v.Annee >= :annee_min';
        $params[':annee_min'] = $_GET['annee_min'];
    }

    // Energy filter
    if (!empty($_GET['energie'])) {
        $conditions[] = 'v.Energie = :energie';
        $params[':energie'] = $_GET['energie'];
    }

    // Transmission filter
    if (!empty($_GET['boite'])) {
        $conditions[] = 'v.BoiteVitesse = :boite';
        $params[':boite'] = $_GET['boite'];
    }

    // Build the WHERE clause
    $whereClause = implode(' AND ', $conditions);

    // Sorting
    $orderBy = 'v.PrixLocation ASC'; // default sorting
    if (!empty($_GET['sort'])) {
        switch ($_GET['sort']) {
            case 'prix_desc':
                $orderBy = 'v.PrixLocation DESC';
                break;
            case 'prix_asc':
                $orderBy = 'v.PrixLocation ASC';
                break;
            case 'annee_desc':
                $orderBy = 'v.Annee DESC';
                break;
            case 'annee_asc':
                $orderBy = 'v.Annee ASC';
                break;
        }
    }

    // Prepare and execute the query
    $query = "
        SELECT 
            v.*,
            m.NomMarque,
            t.NomType
        FROM Voiture v
        JOIN MarqueVoiture m ON v.IdMarque = m.IdMarque
        JOIN TypeVehicule t ON v.IdType = t.IdType
        WHERE {$whereClause}
        ORDER BY {$orderBy}
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check for availability
    foreach ($cars as &$car) {
        // Query to check if the car is available for the selected dates
        if (!empty($_GET['date_debut']) && !empty($_GET['date_fin'])) {
            $availabilityStmt = $pdo->prepare("
                SELECT COUNT(*) as count
                FROM Reservation
                WHERE IdVoiture = :idVoiture
                AND (
                    (DateDebut BETWEEN :dateDebut AND :dateFin)
                    OR (DateFin BETWEEN :dateDebut AND :dateFin)
                    OR (:dateDebut BETWEEN DateDebut AND DateFin)
                )
                AND Statut NOT IN ('Annulée')
            ");
            
            $availabilityStmt->execute([
                ':idVoiture' => $car['IdVoiture'],
                ':dateDebut' => $_GET['date_debut'],
                ':dateFin' => $_GET['date_fin']
            ]);
            
            $result = $availabilityStmt->fetch(PDO::FETCH_ASSOC);
            $car['isAvailable'] = $result['count'] == 0;
        } else {
            $car['isAvailable'] = true;
        }
    }

    echo json_encode($cars);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?> 