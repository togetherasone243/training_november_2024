<?php
require_once 'config/database-example.php';
require_once 'models/ServiceModel.php';

$database = new Connexion();
$con = $database->getConnexion();

$service = new ServiceModel($con);
$liste_service = $service->get_service();
$title = "Service";

ob_start();
?>
<div class="right" id="right">
    <div class="container">
        <div class="row">
            <?php 
                if (isset($_GET['success'])){
                    ?>
                        <div class="alert alert-info">Enregistrement effectué avec succès</div>

                    <?php 
                }else{
                    if (isset($_GET['error']) && $_GET['error'] == 1){
                        ?>
                        <div class="alert alert-info">Echec d'enregistrement</div>

                    <?php
                    }
                }
            ?>
            <div class="col-lg-10">
                <h1>Enregistrer le projet</h1>
                <form action="/service_process" method="post">
                    <div class="group-nav mt-2">
                        <input type="text" name="nom" class="form-control" placeholder="Nom du service">
                    </div>

                    <div class="group-nav mt-2">
                        <textarea name="description" class="form-control" id="" placeholder="Description  du projet"></textarea>
                    </div>
                    
                    <button class="btn btn-primary" name="save" type="submit">Ajouter</button>
                </form>
            </div>

            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $num = 0;
                            foreach ($liste_service as $data){
                                $num ++;
                                ?>
                                <tr>
                                    <td><?= $num?></td>
                                    <td><?= $data->nom_service?></td>
                                    <td><?= $data->description?></td>
                                    <td>
                                        <a href="" class="btn btn-primary">Modifier</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                               <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$home_page = ob_get_clean();
include 'layout.php';
?>
