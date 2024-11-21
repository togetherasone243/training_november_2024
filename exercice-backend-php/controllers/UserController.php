<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function login($username, $password) {
        $user = $this->userModel->authenticate($username, $password);
        if ($user) {
            // Démarrer la session et enregistrer les informations utilisateur
            session_start();
            $_SESSION['user'] = $user;
            header("Location: /dashboard"); // Rediriger vers le tableau de bord
            exit();
        } else {
            // Rediriger vers la page de login avec une erreur
            header("Location: /login?error=1");
            exit();
        }
    }
}
?>
