<?php 
class DemandeServiceModel{
    private $con;
    private $date;
    public function __construct($con){
        $this->con = $con;
        $this->date = date('Y-m-d');
    }

    public function add_demandeService($client, $service){
        $query = "INSERT INTO demande_service(date_demande, client, `service`) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($query);
        if ($stmt->execute([$this->date, $client, $service])){
            return true;
        }else{
            return false;
        }
    }

    public function get_demandeService(){
        $query = "SELECT demande_service.id as demande_id, demande_service.date_demande as dates, client.nom, client.prenom, service.nom_service as service FROM service, client, demande_service WHERE service.id=demande_service.service AND client.id=demande_service.client";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $datas = [];
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $datas[] = $data;
        }
        return $datas;
    }



}