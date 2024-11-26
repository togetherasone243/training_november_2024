
<?php
$host = '127.0.0.1';
$db = 'tasks_db';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion OK";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
