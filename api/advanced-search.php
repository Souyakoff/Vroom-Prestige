<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../config/database.php';

try {
    $conditions = ['1=1']; // Base condition that's always true
    $params = [];
    $availableFilters = [];

    // Base query for available filters
    $baseQuery = "
        SELECT DISTINCT
            m.IdMarque, m.NomMarque,
            t.IdType, t.NomType,
            v.Energie,
            v.BoiteVitesse,
            v.NbPlaces,
            v.Puissance,
            v.Annee
        FROM Voiture v
        JOIN MarqueVoiture m ON v.IdMarque = m.IdMarque
        JOIN TypeVehicule t ON v.IdType = t.IdType
        WHERE 1=1
    ";

    // Apply existing filters to get available options
    if (!empty($_GET['marque'])) {
        $conditions[] = 'v.IdMarque = :marque';
        $params[':marque'] = $_GET['marque'];
    }
    if (!empty($_GET['type'])) {
        $conditions[] = 'v.IdType = :type';
        $params[':type'] = $_GET['type'];
    }
    if (!empty($_GET['energie'])) {
        $conditions[] = 'v.Energie = :energie';
        $params[':energie'] = $_GET['energie'];
    }
    if (!empty($_GET['boite'])) {
        $conditions[] = 'v.BoiteVitesse = :boite';
        $params[':boite'] = $_GET['boite'];
    }
    if (!empty($_GET['places'])) {
        $conditions[] = 'v.NbPlaces = :places';
        $params[':places'] = $_GET['places'];
    }
    if (!empty($_GET['puissance_min'])) {
        $conditions[] = 'v.Puissance >= :puissance_min';
        $params[':puissance_min'] = $_GET['puissance_min'];
    }
    if (!empty($_GET['puissance_max'])) {
        $conditions[] = 'v.Puissance <= :puissance_max';
        $params[':puissance_max'] = $_GET['puissance_max'];
    }
    if (!empty($_GET['prix_min'])) {
        $conditions[] = 'v.PrixLocation >= :prix_min';
        $params[':prix_min'] = $_GET['prix_min'];
    }
    if (!empty($_GET['prix_max'])) {
        $conditions[] = 'v.PrixLocation <= :prix_max';
        $params[':prix_max'] = $_GET['prix_max'];
    }
    if (!empty($_GET['annee_min'])) {
        $conditions[] = 'v.Annee >= :annee_min';
        $params[':annee_min'] = $_GET['annee_min'];
    }
    if (!empty($_GET['annee_max'])) {
        $conditions[] = 'v.Annee <= :annee_max';
        $params[':annee_max'] = $_GET['annee_max'];
    }

    // Get available filter options based on current selection
    $whereClause = implode(' AND ', $conditions);
    $filterQuery = $baseQuery . " AND " . $whereClause;
    
    $stmt = $pdo->prepare($filterQuery);
    $stmt->execute($params);
    $filterResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process available filter options
    $availableFilters = [
        'marques' => [],
        'types' => [],
        'energies' => [],
        'boites' => [],
        'places' => [],
        'puissance' => ['min' => PHP_INT_MAX, 'max' => 0],
        'annees' => ['min' => PHP_INT_MAX, 'max' => 0]
    ];

    foreach ($filterResults as $row) {
        // Collect unique values for each filter
        $availableFilters['marques'][$row['IdMarque']] = $row['NomMarque'];
        $availableFilters['types'][$row['IdType']] = $row['NomType'];
        $availableFilters['energies'][] = $row['Energie'];
        $availableFilters['boites'][] = $row['BoiteVitesse'];
        $availableFilters['places'][] = $row['NbPlaces'];
        
        // Update min/max values
        $availableFilters['puissance']['min'] = min($availableFilters['puissance']['min'], $row['Puissance']);
        $availableFilters['puissance']['max'] = max($availableFilters['puissance']['max'], $row['Puissance']);
        $availableFilters['annees']['min'] = min($availableFilters['annees']['min'], $row['Annee']);
        $availableFilters['annees']['max'] = max($availableFilters['annees']['max'], $row['Annee']);
    }

    // Clean up the filter arrays
    $availableFilters['energies'] = array_unique($availableFilters['energies']);
    $availableFilters['boites'] = array_unique($availableFilters['boites']);
    $availableFilters['places'] = array_unique($availableFilters['places']);
    sort($availableFilters['energies']);
    sort($availableFilters['boites']);
    sort($availableFilters['places']);

    // Get the actual search results
    $searchQuery = "
        SELECT 
            v.*,
            m.NomMarque,
            m.LogoMarque,
            t.NomType
        FROM Voiture v
        JOIN MarqueVoiture m ON v.IdMarque = m.IdMarque
        JOIN TypeVehicule t ON v.IdType = t.IdType
        WHERE {$whereClause}
    ";

    // Add sorting
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
            case 'puissance_desc':
                $orderBy = 'v.Puissance DESC';
                break;
            case 'puissance_asc':
                $orderBy = 'v.Puissance ASC';
                break;
        }
    }
    $searchQuery .= " ORDER BY " . $orderBy;

    $stmt = $pdo->prepare($searchQuery);
    $stmt->execute($params);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check for availability if dates are provided
    if (!empty($_GET['date_debut']) && !empty($_GET['date_fin'])) {
        foreach ($cars as &$car) {
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
        }
    }

    echo json_encode([
        'success' => true,
        'filters' => $availableFilters,
        'count' => count($cars),
        'cars' => $cars
    ]);

} catch(Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database error: ' . $e->getMessage()
    ]);
}
?> 