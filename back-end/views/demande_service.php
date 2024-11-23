<?php
require_once 'config/database-example.php';
require_once 'models/ServiceModel.php';
require_once 'models/ClientModel.php';
require_once 'models/DemandeServiceModel.php';

$database = new Connexion();
$con = $database->getConnexion();

$service = new ServiceModel($con);
$client = new ClientModel($con);
$DemandeService = new DemandeServiceModel($con);
$liste_service = $service->get_service();
$liste_client = $client->get_client();
$liste_demande_service = $DemandeService->get_demandeService();
$title = "Demande service";

ob_start();
?>
<div class="right" id="right">
    <div class="container">
        <div class="row">
            <?php 
                if (isset($_GET['success'])){?><div class="alert alert-info">L'opération réussie</div>
                    <?php 
                }else{
                    if (isset($_GET['error']) && $_GET['error'] == 1){
                        ?>
                        <div class="alert alert-danger">L'opération échouée</div>

                    <?php
                    }
                }
            ?>
            <div class="col-lg-10">
                <h1>Ajouter demande</h1>
                <form action="/demandeService_process" method="post">
                    <div class="group-nav mt-2">
                        <select name="service" id="" class="form-control">
                            <option selected disabled >Séléctionner un service</option>
                            <?php 
                                foreach ($liste_service as $dataService){
                                    ?>
                                        <option value="<?= $dataService->id?>"><?= $dataService->nom_service?></option>
                                    <?php 
                                }
                            ?>
                            
                        </select>
                    </div>

                    <div class="group-nav mt-2">
                        <select name="client" id="" class="form-control">
                            <option selected disabled >Séléctionner un client</option>
                            <?php 
                                foreach ($liste_client as $dataclient){
                                    ?>
                                        <option value="<?= $dataclient->id?>"><?= $dataclient->nom . " " . $dataclient->prenom ?></option>
                                    <?php 
                                }
                            ?>
                        </select>
                    </div>
                    
                    <button class="btn btn-primary" name="save" type="submit">Ajouter</button>
                </form>
            </div>

            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Clients</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $num = 0;
                            foreach ($liste_demande_service  as $data){
                                $num ++;
                                ?>
                                <tr>
                                    <td><?= $num?></td>
                                    <td><?= $data->nom . " " . $data->prenom?></td>
                                    <td><?= $data->service?></td>
                                    <td><?= $data->dates?></td>
                                    <td>
                                        <form action="/service?edit" method="POST">
                                            <input type="hidden" value="<?= $data->id?>" name="id">
                                            <button class="btn btn-primary" type="submit">Edit</button>
                                        </form>
                                        <form action="/service?confirmer" method="POST">
                                        <input type="hidden" value="<?= $data->id?>" name="id">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
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
