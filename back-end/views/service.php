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
                if (isset($_GET['success'])){?><div class="alert alert-info">L'opération réussie</div>
                    <?php 
                }else{
                    if (isset($_GET['error']) && $_GET['error'] == 1){
                        ?>
                        <div class="alert alert-danger">L'opération échouée</div>

                    <?php
                    }
                }

                if (isset($_GET['confirmer'])){
                    session_start();
                    $_SESSION['id'] = htmlspecialchars($_POST['id']);
                    ?>
                        <div class="alert alert-info">Voulez-vous vraiment supprimer?
                            <form action="/Service_delete" method="POST">
                                <input type="hidden" name="delete_id" value="<?= $_SESSION['id']?>">
                                <button type="sumbit" class="btn btn-primary btn-sm">OUI</button>
                            </form>   
                              <a href="/service" class="btn btn-danger btn-sm">NON</a>
                         </div>

                    <?php
                }
            ?>
            <div class="col-lg-10">
                <?php if (isset($_GET['edit'])) : 
                    $id_edit = htmlspecialchars($_POST['id']);
                    $valeurs = $service->get_service_by_id($id_edit);?>
                    
                <h1>Modifier le service</h1>
                <?php 
                    foreach ($valeurs as $values){?>
                        <form action="/service_edit" method="post">
                            <div class="group-nav mt-2">
                                <input type="text" name="nom" class="form-control" placeholder="Nom du service" value="<?= $values->nom_service?>">
                            </div>

                            <div class="group-nav mt-2">
                                <textarea name="description" class="form-control" id="" placeholder="Description  du projet"><?= $values->description?></textarea>
                            </div>
                            <input type="hidden" name="id_edit" value="<?= $values->id?>">
                            
                            <button class="btn btn-primary" type="submit">Appliquer</button>
                        </form>
                        <?php 
                    }
                ?>
                
                <?php endif ?>
                <?php if (! isset($_GET['edit'])) :?>
                <h1>Enregistrer le service</h1>
                <form action="/service_process" method="post">
                    <div class="group-nav mt-2">
                        <input type="text" name="nom" class="form-control" placeholder="Nom du service">
                    </div>

                    <div class="group-nav mt-2">
                        <textarea name="description" class="form-control" id="" placeholder="Description  du projet"></textarea>
                    </div>
                    
                    <button class="btn btn-primary" name="save" type="submit">Ajouter</button>
                </form>
                <?php endif ?>
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
