# Liste des Routes de l'API

## Routes pour les paniers
| Route                             | Méthode | Description                         |
|-----------------------------------|---------|-------------------------------------|
| /api/carts                         | GET     | Lister tous les paniers              |
| /api/carts/{id}                    | GET     | Afficher un panier spécifique        |
| /api/carts                         | POST    | Créer un nouveau panier              |
| /api/carts/{id}                    | PUT     | Mettre à jour un panier spécifique   |
| /api/carts/{id}                    | DELETE  | Supprimer un panier spécifique       |

## Routes pour les utilisateurs
| Route                             | Méthode | Description                             |
|-----------------------------------|---------|-----------------------------------------|
| /api/users                         | GET     | Lister tous les utilisateurs            |
| /api/users/create                  | GET     | Formulaire pour créer un utilisateur    |
| /api/users/{user}/edit             | GET     | Formulaire pour éditer un utilisateur   |
| /api/users                         | POST    | Créer un nouvel utilisateur             |
| /api/users/{user}                  | GET     | Afficher un utilisateur spécifique      |
| /api/users/{user}                  | PUT     | Mettre à jour un utilisateur spécifique |
| /api/users/{user}                  | DELETE  | Supprimer un utilisateur spécifique     |

## Routes pour les produits
| Route                             | Méthode | Description                         |
|-----------------------------------|---------|-------------------------------------|
| /api/products                      | GET     | Lister tous les produits            |
| /api/products/{id}                 | GET     | Afficher un produit spécifique      |
| /api/products                      | POST    | Créer un nouveau produit            |
| /api/products/{id}                 | PUT     | Mettre à jour un produit spécifique |
| /api/products/{id}                 | DELETE  | Supprimer un produit spécifique     |

## Routes pour les catégories
| Route                             | Méthode | Description                          |
|-----------------------------------|---------|--------------------------------------|
| /api/categorie                     | GET     | Lister toutes les catégories         |
| /api/categorie/{id}                | GET     | Afficher la liste des produits dans une catégorie |
| /api/categorie                     | POST    | Créer une nouvelle catégorie         |
| /api/categorie/{id}                | PUT     | Mettre à jour une catégorie spécifique |
| /api/categorie/{id}                | DELETE  | Supprimer une catégorie spécifique   |

## Routes pour les commandes
| Route                             | Méthode | Description                         |
|-----------------------------------|---------|-------------------------------------|
| /api/orders                        | GET     | Lister toutes les commandes         |
| /api/orders/{id}                   | GET     | Afficher une commande spécifique    |
| /api/orders                        | POST    | Créer une nouvelle commande         |
| /api/orders/{id}                   | PUT     | Mettre à jour une commande spécifique|
| /api/orders/{id}                   | DELETE  | Supprimer une commande spécifique   |

## Routes pour l'authentification
| Route                             | Méthode | Description                    |
|-----------------------------------|---------|--------------------------------| 
| /api/login                         | POST    | Effectuer la connexion         |
| /api/logout                        | POST    | Se déconnecter                 |
