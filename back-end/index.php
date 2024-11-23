<?php
require_once 'config/database-example.php';
require_once 'controllers/ServiceController.php';
// Traitement du formulaire de login
$database = new Connexion();
$con = $database->getConnexion();

$ServiceController = new ServiceController($con);


$request = trim($_SERVER['REQUEST_URI'], '/'); // Nettoyage de l'URL
$routes = [
    '' => 'views/service.php',           // Route principale (page de login)
    'login' => 'views/login.php',      // Page de login
    'dashboard' => 'views/dashboard.php', // Tableau de bord après connexion
    'logout' => 'controllers/logout.php', // Déconnexion
    'login?error=1' => 'views/login.php', // Page de login avec erreur
    'login?logout=1' => 'views/login.php', // Page de login après déconnexion
    'service' => 'views/service.php',
    'service?success' => 'views/service.php',
    'service?confirmer' => 'views/service.php'
];

// Gestion des routes
if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else if ($request === 'service_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nom_service = $_POST['nom'] ?? '';
    $description = $_POST['description'] ?? '';
    $ServiceController->service($nom_service, $description);
}else if ($request === 'Service_delete' && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['delete_id'] ?? '';
    $ServiceController->delete($id);
}
 else {
    // Si la route n'existe pas, afficher la page 404
    include 'views/404.php';
}
?>