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

### **Frontend** :
- **HTML5** : Structure des pages web, compatible avec la plus part navigateurs.
- **CSS3** : Personnalisation visuelle et mise en page.
- **Tailwind CSS** : Framework CSS, pour créer des designs rapides et cohérents sans écrire beaucoup de CSS personnalisé.
- **JavaScript** : Interaction et dynamisme comme la validation de formulaire et les interactions utilisateur.

### **Backend** :
- **PHP** : Langage de script côté serveur pour gérer les requêtes et interagir avec la base de données.
- **MySQL** : Système de gestion de base de données, pour stocker et gérer les données des véhicules, des comptes clients, et des réservations.

### **Sécurité** :
- **PDO** : Protection contre les injections SQL grâce aux requêtes préparées.


---

## 6. Échéancier

### **Phase 1 : Analyse des besoins et conception de l'architecture** (Semaine 1 à 3)
- Conception de l'architecture des bases de données.
- Élaboration des maquettes des interfaces client et administrateur.

### **Phase 2 : Développement du Frontend** (Semaine 4 à 6)
- Développement des pages pour l'application légère (HTML, CSS, Tailwind).
- Intégration des interactions dynamiques avec JavaScript.

### **Phase 3 : Développement du Backend** (Semaine 6 à 8)
- Développement des fonctionnalités principales : gestion des comptes, des véhicules, et des réservations.
- Connexion avec la base de données MySQL.

### **Phase 4 : Sécurité** (Semaine 8 à 9)
- Implémentation des mécanismes de sécurité requêtes préparées avec PDO.


### **Phase 5 : Tests et Validation** (Semaine 10 à 11)
- Tests sur les deux applications (client et admin).
- Corrections des bugs détectés.

### **Phase 6 : Déploiement** (Semaine 12)
- Déploiement de l'application sur le serveur.
- Mise en place d'une documentation utilisateur.

---

## Conclusion

Le projet "Vroom Prestige" vise à proposer une application intuitive, sécurisée et facile à utiliser, tant pour les clients cherchant à louer des véhicules de prestige que pour les administrateurs gérant les opérations.
