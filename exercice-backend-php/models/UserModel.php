<?php
class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM etudiant WHERE matricule = ? AND pwd = ?";
        $stmt = $this->db->prepare($query);

        // Exécuter avec un tableau contenant les valeurs
        $stmt->execute([$username, $password]);

        // Renvoie les données si l'utilisateur existe
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}
?>
