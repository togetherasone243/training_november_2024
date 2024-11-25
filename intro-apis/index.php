<?php
require 'vendor/autoload.php';

use Slim\Factory\AppFactory;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'config/db.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);
$app->addRoutingMiddleware();

// 1. Récupérer toutes les tâches
$app->get('/tasks', function ($request, $response) {
    $db = DB::connect();
    $stmt = $db->query("SELECT * FROM tasks");
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($tasks));
    return $response->withHeader('Content-Type', 'application/json');
});

// 2. Ajouter une nouvelle tâche
$app->post('/tasks', function ($request, $response) {
    $db = DB::connect();
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $db->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
    $stmt->execute([$data['title'], $data['description']]);
    $response->getBody()->write(json_encode(["message" => "Task created successfully !"]));
    return $response->withHeader('Content-Type', 'application/json');
});

// 3. Mettre à jour une tâche
$app->put('/tasks/{id}', function ($request, $response, $args) {
    $db = DB::connect();
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $db->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$data['title'], $data['description'], $args['id']]);
    $response->getBody()->write(json_encode(["message" => "Task updated successfully !"]));
    return $response->withHeader('Content-Type', 'application/json');
});

// 4. Supprimer une tâche
$app->delete('/tasks/{id}', function ($request, $response, $args) {
    $db = DB::connect();
    $stmt = $db->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$args['id']]);
    $response->getBody()->write(json_encode(["message" => "Task deleted successfully !"]));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
