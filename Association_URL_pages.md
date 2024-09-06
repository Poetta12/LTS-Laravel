# Compétences en développement Laravel

## Installation d'un framework PHP

### Critères :
- Un projet Laravel est créé et fonctionne en local.

### Preuve de travail :
- La page d’accueil de Laravel s’affiche correctement.

---

## Configuration de l'éditeur de code pour PHP et Laravel

### Critères :
- L'éditeur a un code couleur et auto-complète PHP et Laravel.

### Preuve de travail :
- Les plugins comme PHP Intelephense, Laravel Blade Snippets sont installés et configurés dans l'éditeur.

---

## Utilisation de Composer

### Critères :
- Une bibliothèque est requise et installée via Composer.

### Preuve de travail :
- La Debugbar Laravel est installée. Pour l'installer, on exécute `composer require barryvdh/laravel-debugbar`.

---

## Association d'URL à des pages/JSON

### Critères :
- Les différentes pages de l’application sont accessibles via des URL différentes.

### Preuve de travail :
- Les routes sont définies dans `routes/web.php` et `routes/api.php` pour les pages et l'API respectivement.

---

## Connaissance du principe REST de l'API

### Critères :
- Un petit schéma explicatif est préparé.

### Preuve de travail :
- Le schéma montre comment les endpoints sont structurés selon les méthodes REST (GET, POST, PUT, DELETE).

---

## Connaissance du pattern MVC

### Critères :
- Un petit schéma explicatif est préparé.

### Preuve de travail :
- Le schéma illustre comment le Model gère les données, le Controller traite les requêtes et la View affiche les résultats.

---

## Création des tables avec les Migrations

### Critères :
- Générer un fichier de migration et créer la table correspondante dans la base de données.

### Preuve de travail :
- Exemple de commande : `php artisan make:migration create_users_table`. Migration exécutée avec `php artisan migrate`.

---

## Utilisation des Seeder pour intégrer des valeurs dans la base de données

### Critères :
- Un fichier Seeder est créé pour insérer des données dans la base de données.

### Preuve de travail :
- Exemple de Seeder pour créer des utilisateurs : `php artisan make:seeder UserSeeder`. Données insérées avec `php artisan db:seed`.

---

## Récupérer les données d’un formulaire en PHP et les afficher dans une vue

### Critères :
- Des pages affichent des données issues d’un formulaire.

### Preuve de travail :
- Le formulaire HTML soumet les données à une route Laravel qui les traite et les affiche dans une vue.

---

## Mise en place d'une authentification sur l'API

### Critères :
- Il est nécessaire d'être authentifié pour visualiser certaines pages.

### Preuve de travail :
- Sanctum est configuré pour l'authentification API avec des tokens sécurisés pour les routes nécessitant une authentification.

---

## Éviter la redondance de code

### Critères :
- Utilisation des templates dans le back office pour éviter la duplication de code.

### Preuve de travail :
- Les vues Blade utilisent l'héritage de templates pour réutiliser des composants communs comme l'en-tête et le pied de page.

---

## Mise en place d'un Model

### Critères :
- Un Model est créé et utilisé pour interagir avec la base de données.

### Preuve de travail :
- Exemple : `php artisan make:model Product`. Le Model `Product` est utilisé pour accéder et manipuler les données des produits.

---

## Mise à jour des données via le Model

### Critères :
- Des données sont mises à jour en base en utilisant des méthodes d’un Model.

### Preuve de travail :
- Exemple : `$product = Product::find(1); $product->price = 29.99; $product->save();`. Les données sont mises à jour via le Model `Product`.

---

## Configuration / définition des relations entre Models

### Critères :
- Les relations entre les Models sont configurées et utilisées.

### Preuve de travail :
- Exemple : Un Model `Order` a une relation avec `Product` via `hasMany` et `belongsTo`. Les commandes et leurs produits sont correctement associés.

---

## Enumération des principales méthodes HTTP

### Critères :
- Identifier et expliquer les méthodes HTTP GET, POST, PUT et DELETE.

### Preuve de travail :
- Les routes utilisent GET pour récupérer des données, POST pour créer, PUT pour mettre à jour, et DELETE pour supprimer des ressources.

---

## Lister les codes de réponses HTTP principaux et leur signification

### Critères :
- L'étudiant connaît 200, 301, 302, 404, 500 et sait quoi faire en fonction du code.

### Preuve de travail :
- Exemples : 200 (OK), 301 (Redirection permanente), 404 (Non trouvé). Les contrôleurs retournent le bon code HTTP en cas d'erreur ou de ressource non trouvée.

---

## Mettre à jour son code

### Critères :
- Les modifications ont été enregistrées dans l'historique.

### Preuve de travail :
- L'historique Git montre différents commits correspondant aux étapes de développement du projet.

---

## Réalisation d'une description fonctionnelle

### Critères :
- La description fonctionnelle est complète et correspond au site réalisé.

### Preuve de travail :
- La documentation du projet inclut une description fonctionnelle détaillée de l'application PHP-Laravel développée.

