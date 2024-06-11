# Défis SQL

## Installation

-   Prérequis : avoir installé Docker et s'assurer qu'il est lancé
-   Dans le terminal, s'assurer d'être dans le bon dossier et utiliser la commande `docker-compose up --build`

## Points d'accès

Une fois que Docker a terminé l'installation:

-   `index.php` se trouve sur `http://localhost:8001/`
-   phpMyAdmin se trouve sur `http://localhost:8081`

## Les défis

En utilisant principalement des requêtes SQL, afficher :

1. Tous les utilisateurs dont le nom est Palmer
2. Toutes les femmes
3. Toutes les personnes dont l'adresses e-mail contient 'google'
4. Tous les pays dont le nom commence par la lettre 'N'
5. Le nombre d'utilisateurs par pays dans l'ordre croissant (exemple: Spain - 3 users, Italy - 8 users, France - 12 users, etc.)
6. Le nombre d'utilisateurs par genre
7. La moyenne d’âge des utilisateurs de chaque genre
8. Gérer un utilisateur :
    - a. Insérer un utilisateur puis l'afficher (prénom, nom, adresse e-mail)
    - b. Mettre à jour son adresse mail et afficher le résultat
    - c. Supprimer l’utilisateur
