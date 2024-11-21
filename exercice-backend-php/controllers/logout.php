<?php
session_start();

// Vérifier si une session existe
if (isset($_SESSION['user'])) {
    // Détruire toutes les données de la session
    session_unset();
    session_destroy();
}

// Rediriger vers la page de login après la déconnexion
header("Location: /login?logout=1");
exit();
