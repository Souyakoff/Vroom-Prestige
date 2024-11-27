<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

require_once '../config/database.php';

try {
    // Test database connection
    if (!$pdo) {
        throw new Exception("Database connection not established");
    }

    $stmt = $pdo->query("SELECT * FROM MarqueVoiture ORDER BY NomMarque");
    if (!$stmt) {
        throw new Exception("Query failed to execute");
    }

    $brands = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($brands)) {
        // If no brands found, return empty array with a 200 status
        echo json_encode([]);
    } else {
        echo json_encode($brands);
    }
} catch(Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database error: ' . $e->getMessage(),
        'trace' => debug_backtrace()
    ]);
}
?> 