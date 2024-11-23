<?php
require_once 'config/database-example.php';
require_once 'models/CountModel.php';

$database = new Connexion();
$con = $database->getConnexion();

$count = new CountModel($con);
$count_client = $count->get_client_count();
$count_service = $count->get_service_count();
$count_demandeService = $count->get_demandeservice_count();
$title = "Dashboard";

ob_start();
?>

<div class="container">
    <div class="row">
        <a href="/service" class="card col-lg-6 mt-2">
            <h3>Services</h3>
            <?php 
                foreach ($count_service as $data){
                    ?>
                        <h1><?= $data->nombre?></h1>
                    <?php 
                }
            ?>
            
        </a>

        <a href="" class="card col-lg-6 mt-2">
            <h3>Client</h3>
            <?php 
                foreach ($count_client as $data){
                    ?>
                        <h1><?= $data->nombre?></h1>
                    <?php 
                }
            ?>
        </a>

        <a href="/damndeService" class="card col-lg-6 mt-2">
            <h3>Demande service</h3>
            <?php 
                foreach ($count_demandeService as $data){
                    ?>
                        <h1><?= $data->nombre?></h1>
                    <?php 
                }
            ?>
        </a>
    </div>

</div>

<?php
$home_page = ob_get_clean();
include 'layout.php';
?>