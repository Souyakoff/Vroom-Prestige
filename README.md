# Cahier des Charges – Applications Vroom Prestige

## 1. Présentation du Projet

**Nom du projet** : Applications Vroom Prestige  
**Client** : Vroom Prestige, entreprise de location de voitures de prestige basée à La Rochelle  
**Objectif** : Développer une application web pour la location de voitures de prestige, offrant une interface utilisateur simple pour les clients et une interface d'administration pour les employés.  

**Cible** : 
- Clients souhaitant louer des voitures de prestige
- Employés de Vroom Prestige gérant les locations de voitures

## 2. Objectifs

L'application sera composée de deux principales interfaces :
- **Application légère pour les clients** : accessible au public, permet de rechercher, consulter et réserver des véhicules.
- **Application lourde pour les administrateurs** : réservée aux employés de Vroom Prestige pour la gestion des véhicules, des comptes clients, et des réservations.

## 3. Fonctionnalités

### 3.1 Application légère (Client)

#### 3.1.1 Recherche de véhicule
- **Acteur** : Client
- **Description** : Recherche de véhicules par le client, avec des filtres pour affiner les résultats.
- **Détails** :
  - Barre de recherche sur la page d'accueil.
  - Recherche possible par mot-clé (marque, modèle, caractéristiques).
  - Filtres disponibles : marque, modèle, type de transmission, type de carburant, prix, etc...

#### 3.1.2 Création de compte client
- **Acteur** : Visiteur
- **Description** : Inscription des nouveaux clients.
- **Détails** :
  - Formulaire de création de compte.
  - Champs requis : Nom, prénom, email, mot de passe, numéro de téléphone.
  - Vérification des informations (mot de passe fort, adresse email valide).
  - Envoi d'un email de confirmation contenant un lien de validation.
  - Une fois l'email validé, le compte est activé.

#### 3.1.3 Prise de rendez-vous pour une location
- **Acteur** : Client
- **Description** : Réservation d'un véhicule pour une durée déterminée.
- **Détails** :
  - Sélection d'un véhicule disponible avec affichage des caractéristiques (marque, modèle, prix).
  - Choix des dates de location (début et fin).
  - Vérification de la disponibilité du véhicule.
  - Confirmation de la réservation par le client.
  - Paiement sécurisé en ligne.
  - Envoi d'un email de confirmation au client.

#### 3.1.4 Consultation des coordonnées de l'entreprise
- **Acteur** : Visiteur
- **Description** : Consulter les informations de contact de Vroom Prestige.
- **Détails** :
  - Page accessible à partir de "Contact".
  - Affichage des coordonnées : adresse, numéro de téléphone, email.
  - Formulaire de contact direct pour envoyer un message à l'entreprise.

### 3.2 Application lourde (Admin)

#### 3.2.1 Connexion en tant qu'administrateur
- **Acteur** : Administrateur
- **Description** : Accès à l'interface d'administration.
- **Détails** :
  - Connexion avec identifiants (nom d'utilisateur et mot de passe).
  - Vérification des permissions et redirection vers le tableau de bord d'administration.

#### 3.2.2 Gestion des véhicules
- **Acteur** : Administrateur
- **Description** : Gestion des véhicules disponibles à la location.
- **Détails** :
  - Ajout, modification et suppression de véhicules.
  - Mise à jour des informations : marque, modèle, prix, disponibilité, caractéristiques.

#### 3.2.3 Gestion des comptes clients
- **Acteur** : Administrateur
- **Description** : Gestion des clients inscrits.
- **Détails** :
  - Consultation des informations des clients inscrits.
  - Modification ou suppression de comptes clients en cas de problème.
  - Consultation des réservations passées et en cours des clients.

#### 3.2.4 Gestion des réservations
- **Acteur** : Administrateur
- **Description** : Suivi et gestion des réservations de véhicules.
- **Détails** :
  - Consultation de l'état des réservations.
  - Validation ou annulation des réservations.
  - Gestion des paiements et des confirmations envoyées aux clients.

## 4. Technologies Utilisées

### Application Légère (Client)
- **Frontend** : HTML5, CSS3, TailWind, JavaScript
- **Backend** : PHP pour le traitement des requêtes liées aux recherches et réservations des clients
- **Base de Données** : MySQL

### Application Lourde (Admin)
- **Frontend** : C# ou Python
- **Backend** : C# ou Python
- **Base de Données** : MySQL
- **Sécurité et Authentification** : Ajout de mesures de sécurité renforcées pour l'accès admin, comme une double authentification

## 5. Hébergement et Déploiement

## 6. Échéancier
- **Semaine 1-3** : Analyse des besoins et conception de l'architecture.
- **Semaine 3** : 

Voici des exemples de contraintes possibles pour chaque application. Cela pourrait t'aider à structurer les aspects techniques, fonctionnels, et réglementaires de chaque interface.

---

### 7. Contraintes

#### 7.1 Application Légère (Client)

1. **Contraintes Fonctionnelles** :
   - La recherche de véhicules doit être rapide, avec une réponse en moins de 2 secondes.
   - Les filtres doivent être intuitifs, facilement modifiables, et doivent être appliqués sans rechargement de la page.
   - Le formulaire de création de compte doit inclure une vérification en temps réel (ex: force du mot de passe).
   - Le paiement en ligne doit être sécurisé et respecter les normes PCI-DSS pour la sécurité des transactions.

2. **Contraintes Techniques** :
   - Compatibilité avec les navigateurs modernes (Chrome, Firefox, Safari, Edge) en versions récentes.
   - Le site doit être responsive pour une utilisation fluide sur mobiles et tablettes.
   - Limitation des dépendances extérieures pour garantir des temps de chargement rapides.
   - Optimisation des images et des vidéos de présentation des véhicules pour minimiser le poids des pages.

3. **Contraintes de Sécurité** :
   - Utilisation de HTTPS pour toutes les pages, avec une redirection automatique pour sécuriser les connexions.
   - Les mots de passe des clients doivent être chiffrés en base de données.
   - Ajout d’une double authentification lors de l’inscription (via email) pour éviter les inscriptions frauduleuses.

4. **Contraintes Réglementaires** :
   - Conformité au RGPD, notamment pour la collecte et le stockage des données personnelles des clients.
   - Consentement explicite pour l’envoi d’emails (opt-in pour les notifications, les promotions).

#### 7.2 Application Lourde (Admin)

1. **Contraintes Fonctionnelles** :
   - Le tableau de bord doit permettre un aperçu rapide des réservations en cours, des véhicules disponibles, et des comptes clients actifs.
   - Les actions d’ajout, de modification et de suppression de données (véhicules, clients) doivent être accessibles en un minimum d'étapes.
   - Des notifications ou alertes internes doivent être affichées pour les réservations urgentes ou les demandes spéciales.

2. **Contraintes Techniques** :
   - L’application doit être accessible uniquement via le réseau interne de Vroom Prestige (ou via VPN pour des connexions externes sécurisées).
   - Gestion des logs pour toutes les actions administratives (ajout/suppression/modification) pour traçabilité.
   - Limitation de l’accès simultané à un maximum de sessions par administrateur pour éviter les abus.

3. **Contraintes de Sécurité** :
   - Authentification multi-facteurs pour chaque connexion administrateur.
   - Stockage sécurisé des données sensibles et des informations de paiement en conformité avec la norme PCI-DSS.
   - Les mots de passe des administrateurs doivent être chiffrés avec une fonction de hachage forte (ex: bcrypt ou Argon2).
   - Suivi des tentatives de connexion échouées avec blocage temporaire en cas de répétitions excessives.

4. **Contraintes Réglementaires** :
   - Respect du RGPD pour les données clients, notamment pour leur modification et leur suppression sur demande.
   - Mise en place d’une politique de confidentialité pour les employés, détaillant les droits et responsabilités en matière de gestion des données.


## Conclusion

Le projet "Vroom Prestige" vise à proposer une application intuitive, sécurisée et facile à utiliser, tant pour les clients cherchant à louer des véhicules de prestige que pour les administrateurs gérant les opérations.
