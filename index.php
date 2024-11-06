<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Prestige - Location de Voitures de Prestige</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenue sur Vroom Prestige</h1>
        <p>Découvrez notre sélection de voitures de prestige à louer.</p>
    </header>
    
    <section id="search">
        <form action="index.php" method="get">
            <input type="text" name="query" placeholder="Rechercher une voiture par marque ou modèle">
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section id="vehicules">
        <h2>Nos véhicules disponibles</h2>
        <div class="vehicle-list">
            <?php include 'fetch_vehicles.php'; ?>
        </div>
    </section>

    <footer>
        <p>Contactez-nous : <a href="mailto:contact@vroomprestige.com">contact@vroomprestige.com</a></p>
    </footer>
</body>
</html>

