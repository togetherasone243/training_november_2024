<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'vote_uac';
    private $username = 'root'; // Modifier si nécessaire
    private $password = 'root';    // Modifier si nécessaire
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
