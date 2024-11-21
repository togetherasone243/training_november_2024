<?php
require_once 'config/database.php';
require_once 'controllers/UserController.php';

$request = trim($_SERVER['REQUEST_URI'], '/'); // Nettoyage de l'URL
$routes = [
    '' => 'views/login.php',           // Route principale (page de login)
    'login' => 'views/login.php',      // Page de login
    'dashboard' => 'views/dashboard.php', // Tableau de bord après connexion
    'logout' => 'controllers/logout.php', // Déconnexion
    'login?error=1' => 'views/login.php', // Page de login avec erreur
    'login?logout=1' => 'views/login.php' // Page de login après déconnexion
];

// Gestion des routes
if (array_key_exists($request, $routes)) {
    include $routes[$request];
} else if ($request === 'login_process' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire de login
    $database = new Database();
    $db = $database->getConnection();
    $userController = new UserController($db);

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $userController->login($username, $password);
} else {
    // Si la route n'existe pas, afficher la page 404
    include 'views/404.php';
}
?>
