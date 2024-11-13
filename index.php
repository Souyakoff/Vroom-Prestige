<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Vroom Prestige propose une sélection exclusive de voitures de prestige pour des expériences de conduite inoubliables. Louez dès maintenant !">
    <meta name="keywords" content="location voiture prestige, voiture luxe, Vroom Prestige, location Ferrari, location Lamborghini, location Porsche">
    <meta name="author" content="Vroom Prestige">
    <title>Vroom Prestige - Location de Voitures de Prestige</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Bienvenue sur Vroom Prestige</h1>
        <p>Découvrez notre sélection de voitures de prestige à louer.</p>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#vehicules">Nos véhicules</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">À propos</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="search">
        <form action="index.php" method="get">
            <input type="text" name="query" placeholder="Rechercher une voiture par marque ou modèle">
            <button type="submit">Rechercher</button>
        </form>
    </section>

    <section id="vehicules">
        <h2>Nos véhicules disponibles</h2>
        <p class="description">
            Explorez notre flotte de voitures de luxe soigneusement sélectionnées pour répondre à toutes vos attentes, que ce soit pour un événement spécial ou simplement pour le plaisir de conduire.
        </p>
        <div class="vehicle-list">
            <?php include 'fetch_vehicles.php'; ?>
        </div>
    </section>

    <section id="services">
        <h2>Nos Services</h2>
        <ul>
            <li>Location courte et longue durée</li>
            <li>Assistance 24/7</li>
            <li>Livraison et reprise de véhicule</li>
            <li>Assurance tous risques incluse</li>
        </ul>
    </section>

    <section id="testimonials">
        <h2>Ce que disent nos clients</h2>
        <blockquote>
            "Une expérience incroyable ! La Ferrari que j'ai louée était impeccable et le service client au top !" - Jean D.
        </blockquote>
        <blockquote>
            "Merci à Vroom Prestige pour avoir rendu notre mariage encore plus spécial avec cette magnifique Bentley." - Claire & Paul
        </blockquote>
    </section>

    <footer>
        <div class="footer-content">
            <p>Contactez-nous : <a href="mailto:contact@vroomprestige.com">contact@vroomprestige.com</a></p>
            <p>Téléphone : <a href="tel:+33123456789">+33 1 23 45 67 89</a></p>
            <p>Suivez-nous sur : 
                <a href="#" target="_blank">Facebook</a> | 
                <a href="#" target="_blank">Instagram</a> | 
                <a href="#" target="_blank">Twitter</a>
            </p>
        </div>
        <p>&copy; 2024 Vroom Prestige. Tous droits réservés.</p>
    </footer>
</body>
</html>
