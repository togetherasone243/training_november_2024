## Introduction aux APIS

- Pour commencer, rassurez vous que mysql est bien installé et que le service est lancé. (vous pouvez installer laragon pour vous aider)
- Créez une base de données nommée `training_demo_1` et importez le fichier `database.sql`
- Clonez le repository
- Installez les dépendances avec la commande `composer install`
- Créez un fichier `.env` à la racine du projet et copiez/collez le contenu de `.env.example` dedans
- Lancez le serveur avec la commande `php -S localhost:7000`
- Vous pouvez voir toute la documentation sur https://documenter.getpostman.com/view/14572798/2sAYBUEsgW

---
1. Vérifier les tâches (GET /tasks)
Cette commande récupère toutes les tâches de la base de données.

```bash
curl -X GET http://localhost:7000/tasks
```
Explications :
-X GET : Spécifie une requête GET.
http://localhost:7000/tasks : URL de l'API à tester.
2. Ajouter une nouvelle tâche (POST /tasks)
Cette commande ajoute une nouvelle tâche en envoyant un objet JSON dans le corps de la requête.

```bash
curl -X POST http://localhost:7000/tasks \
     -H "Content-Type: application/json" \
     -d '{"title": "Ma première tâche", "description": "Ceci est une tâche de test"}'
```
Explications :
-X POST : Spécifie une requête POST.
-H "Content-Type: application/json" : Indique que le contenu envoyé est en JSON.
-d '{...}' : Les données JSON envoyées dans le corps de la requête.
3. Mettre à jour une tâche (PUT /tasks/{id})
Cette commande met à jour une tâche existante en spécifiant son id dans l'URL.

```bash
curl -X PUT http://localhost:7000/tasks/1 \
     -H "Content-Type: application/json" \
     -d '{"title": "Tâche mise à jour", "description": "Description mise à jour"}'
```
Explications :
http://localhost:7000/tasks/1 : Changez 1 par l'id de la tâche à mettre à jour.
Les autres options sont similaires au POST.
4. Supprimer une tâche (DELETE /tasks/{id})
Cette commande supprime une tâche existante en spécifiant son id dans l'URL.

```bash
curl -X DELETE http://localhost:7000/tasks/1
```
Explications :
-X DELETE : Spécifie une requête DELETE.
http://localhost:7000/tasks/1 : Changez 1 par l'id de la tâche à supprimer.
Conseils supplémentaires pour tester avec cURL :
Vérifiez que votre serveur est en cours d'exécution : Assurez-vous que le serveur fonctionne avec la commande :

```bash
php -S localhost:7000 -t public
```
Vérifiez que votre base de données est correctement configurée :

Assurez-vous que la table tasks existe et qu'elle a au moins les colonnes suivantes :
id (clé primaire, auto-incrémentée).
title (varchar).
description (varchar).
Activer les erreurs :

Si une erreur survient, vous pouvez l'activer avec :
```php
$app->addErrorMiddleware(true, true, true);
```
Déboguez les réponses : Si vous ne recevez pas la réponse attendue, ajoutez l'option -v dans la commande cURL pour voir les détails :

```bash
curl -v -X GET http://localhost:7000/tasks
```
