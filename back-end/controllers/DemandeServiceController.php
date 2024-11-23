<?php 
require_once ('models/DemandeServiceModel.php');

class DemandeServiceController{
    private $demandeservice;

    public function __construct($con){
        $this->demandeservice = new DemandeServiceModel($con);
    }

    public function demandeservice($client, $service){
        $data_damande = $this->demandeservice->add_demandeService($client, $service);
        if ($data_damande){
            header('Location:demandeService?success');
        }else{
            header('Location:demandeService?error=1');
        }
    }
}