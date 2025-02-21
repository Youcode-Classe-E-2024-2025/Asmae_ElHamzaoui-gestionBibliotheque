# Asmae_ElHamzaoui-gestionBibliotheque
# Application de Gestion de Bibliothèque avec Laravel

## Description

Cette application permet de gérer les utilisateurs, les livres et les emprunts dans une bibliothèque. Elle offre des fonctionnalités telles que l'inscription, la connexion, la gestion des profils utilisateurs, l'ajout, la modification et la suppression de livres, ainsi que l'enregistrement des emprunts et des retours de livres.

---

## Fonctionnalités

1. **Authentification :**
   - **Inscription** : Les utilisateurs peuvent créer un compte avec un formulaire d'inscription.
   - **Connexion** : Les utilisateurs peuvent se connecter avec leurs identifiants.
   - **Déconnexion** : L'utilisateur peut se déconnecter de son compte.
   - **Affichage des profils** : L'utilisateur peut consulter son profil après connexion.

2. **Gestion des livres :**
   - **Afficher la liste des livres disponibles** : Une vue affiche tous les livres disponibles dans la bibliothèque.
   - **Ajouter de nouveaux livres** : L'administrateur peut ajouter des livres en remplissant un formulaire.
   - **Modifier ou supprimer des livres existants** : Les livres peuvent être modifiés ou supprimés selon les droits de l'utilisateur.

3. **Gestion des emprunts :**
   - **Enregistrer les emprunts** : Les utilisateurs peuvent emprunter un livre. Les informations sur l'emprunt sont enregistrées dans la base de données.
   - **Retour des livres** : Lorsqu'un livre est retourné, son statut est mis à jour pour être de nouveau disponible.

---

## Choix Techniques

### 1. **Framework utilisé : Laravel**
Laravel a été choisi pour cette application pour ses avantages en termes de productivité et de sécurité. Voici quelques raisons :
   - **Système d'authentification intégré** : Laravel facilite la gestion des utilisateurs, l'inscription, la connexion et la déconnexion avec des méthodes simples à configurer.
   - **Migrations et Eloquent ORM** : Laravel offre un système de migrations facile à utiliser pour gérer la base de données et un ORM performant pour interagir avec celle-ci.
   - **Blade Templates** : Le moteur de templates Blade permet de séparer la logique du front-end de la logique back-end, rendant l'application facile à maintenir.
   - **Sécurité** : Laravel inclut des fonctionnalités de sécurité par défaut telles que la protection contre les injections SQL, le hachage des mots de passe, et la validation des entrées utilisateurs.

### 2. **Base de données : PostgreSQL**
PostgreSQL a été choisi comme système de gestion de base de données en raison de ses performances et de sa compatibilité avec Laravel.

   - **Tables principales** :
     - `users` : Contient les informations des utilisateurs (nom, email, mot de passe).
     - `books` : Contient les informations des livres (titre, auteur, disponibilité).
     - `loans` : Contient les informations sur les emprunts (utilisateur, livre, date d'emprunt, date de retour).

### 3. **Architecture MVC**
L'application suit le modèle **MVC (Modèle-Vue-Contrôleur)** pour organiser le code de manière structurée et maintenable. Les principales composantes sont :
   - **Modèles (Models)** : Représentent les données et la logique de l'application. Exemple : `User`, `Book`, `loans`.
   - **Vues (Views)** : Les pages HTML rendues par l'utilisateur. Exemple : `index.blade.php`, `profile.blade.php`.
   - **Contrôleurs (Controllers)** : Gèrent la logique d'application et l'interaction entre le modèle et la vue. Exemple : `BookController`.

### 4. **Gestion des erreurs et validation**
   - Utilisation de la **validation intégrée** de Laravel pour valider les formulaires d'inscription, de connexion et d'ajout de livres.
   - Gestion des erreurs avec des messages d'erreur clairs et appropriés pour l'utilisateur.
   - Sécurisation des formulaires avec **CSRF Tokens** et protection contre les attaques XSS et SQL injection.

### 5. **Tests**
Des tests ont été écrits pour valider les fonctionnalités de l'application, y compris :
   - Tests unitaires pour les fonctions critiques du backend.
   - Tests fonctionnels pour vérifier l'intégrité du processus d'emprunt et de retour de livres.

---

## Installation

### Prérequis

- **PHP** 8.x ou supérieur
- **Composer** (gestionnaire de dépendances PHP)
- **PostgreSQL** installé et configuré

### Étapes d'installation

1. **Cloner le projet** :

   ```bash
   git clone https://github.com/Youcode-Classe-E-2024-2025/Asmae_ElHamzaoui-gestionBibliotheque
   cd  Asmae_ElHamzaoui-gestionBibliotheque


