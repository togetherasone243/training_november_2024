<?php 
class ServiceModel{
    private $con;
    public function __construct($con){
        $this->con = $con;
    }

    public function add_service($nom_service, $description){
        $query = "INSERT INTO `service`(nom_service, `description`) VALUES (?, ?)";
        //preparation de la requete
        $stmt = $this->con->prepare($query);
        //execution de la requete
        if ($stmt->execute([$nom_service, $description])){
            return true;
        }else{
            return false;
        }
    }

    public function get_service(){
        $query = "SELECT * FROM `service`";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }

    public function delete_service($id){
        $query = "DELETE FROM `service` WHERE id = ?";
        $stmt = $this->con->prepare($query);
        if ($stmt->execute([$id])){
            return true;
        }else{
            return false;
        }
    }

    public function get_service_by_id($id){
        $query = "SELECT * FROM `service` WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$id]);

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }

    public function update_service($nom_service, $description, $id){
        $query = "UPDATE `service` SET nom_service = ?, `description` = ? WHERE id = ?";
        $stmt = $this->con->prepare($query);
        if ($stmt->execute([$nom_service, $description, $id])){
            return true;
        }else{
            return false;
        }
    }




}

?>