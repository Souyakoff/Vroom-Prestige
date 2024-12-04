<?php
// Database credentials for Debian
define('DB_HOST', 'localhost');
define('DB_USER', 'root');      // Your MariaDB root username
define('DB_PASS', '');          // Your MariaDB root password (set during mysql_secure_installation)
define('DB_NAME', 'vroom_prestige');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        )
    );
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 