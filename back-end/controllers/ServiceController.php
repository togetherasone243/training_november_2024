<?php 
require_once ('models/ServiceModel.php');

class ServiceController{
    private $ServiceModel;

    public function __construct($con){
        $this->ServiceModel = new ServiceModel($con);
    }

    public function service($nom_service, $description){
        $data_service = $this->ServiceModel->add_service($nom_service, $description);
        if ($data_service){
            header('Location:service?success');
        }else{
            header('Location:service?error=1');
        }
    }

    public function select_service(){
        $data_service = $this->ServiceModel->get_service();
        return $data_service;
    }

    public function delete($id){
        $delete_data = $this->ServiceModel->delete_service($id);
        if ($delete_data){
            header('Location:service?success');
        }else{
            header('Location:service?error=1');
        }
    }
    
}
?>