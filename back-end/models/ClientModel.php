<?php 
class ClientModel{
    private $con;
    public function __construct($con){
        $this->con = $con;
    }

    public function get_client(){
        $query = "SELECT * FROM client";
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