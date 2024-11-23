<?php
// Layout principal
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="..\assets\img\icons\font\bootstrap-icons.css">
    <link rel="stylesheet" href="..\assets\icons\font\bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<style>
    /* Tu peux ajouter ton style ici */
    .service-card {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .service-card i {
        font-size: 2rem;
        color: #007bff;
    }
    .service-card h5 {
        color: #343a40;
    }
</style>
<body>
    
    <div class="main container-fluid">
        <div  style="display: flex;" id="left" class="left">
            <div class="leftContent" id="leftContent" >
                <br>
                <!-- composant principale left -->
                <?php require_once ("include/navbar.php"); ?>
                
    
    </div>
       <!-- bouton pour afficher et masquer -->
       <div id="AfficherLeft">
              <i class="bi bi-list"></i>
       </div> 
    </div>

        <?= $home_page; ?> 
    </div>
        <!-- FIN -->
    </div>
<script src="./Asset/js/index.js">    
</script> 
</body>
</html>  
