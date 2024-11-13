<?php
include 'db_connect.php';

$query = $pdo->query("SELECT marque, modele, prix, image FROM vehicules WHERE disponibilite = 1");

while ($row = $query->fetch()) {
    echo "<div class='vehicle'>";
    echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['marque'] . " " . $row['modele']) . "'>";
    echo "<h3>" . htmlspecialchars($row['marque']) . " " . htmlspecialchars($row['modele']) . "</h3>";
    echo "<p>Prix: " . htmlspecialchars($row['prix']) . " € / jour</p>";
    echo "</div>";
}
?>
