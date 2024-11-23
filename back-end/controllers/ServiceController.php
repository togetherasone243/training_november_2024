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

    public function get_service($id){
        $select_service_by_id = $this->ServiceModel->get_service_by_id($id);
        return $select_service_by_id;
    }

    public function update($nom_service, $description, $id){
        $update_service = $this->ServiceModel->update_service($nom_service, $description, $id);
        if ($update_service){
            header('Location:service?success');
        }else{
            header('Location:service?error=1');
        }
    }
    
}
?>