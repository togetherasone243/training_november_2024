<?php 
class CountModel{
    private $con;
    public function __construct($con){
        $this->con = $con;
    }

    public function get_client_count(){
        $query = "SELECT COUNT(*) as nombre FROM client";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }

    public function get_service_count(){
        $query = "SELECT COUNT(*) as nombre FROM `service`";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }

    public function get_demandeservice_count(){
        $query = "SELECT COUNT(*) as nombre FROM demande_service";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }





}

?>