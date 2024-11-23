<?php 
///creation de classe 

class Connexion{

    private $host = "localhost";
    private $dbname = "tech_eng";
    private $username = "root";
    private $password = "";
    private $con;

    //creation de la methode du chemin d'accès à la bd
    public function getConnexion(){
        $this->con = null;

        //gestion des exceptions 
        try {
            //instance de chemin d'accès à la bd
            $this->con = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->dbname, $this->username, $this->password);
        } catch (PDOException $ex) {
            echo "Echec de connexion". $ex->getMessage();
        }
        return $this->con;
    }
}