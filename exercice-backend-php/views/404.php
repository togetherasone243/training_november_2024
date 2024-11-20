<?php
$title = "Page Not Found";
ob_start();
?>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <img src="/assets/imgs/error.png" alt="Not Found Icon" class="mb-4" width="200" height="200">
            <h1 class="display-4">404</h1>
            <p class="lead">Page Not Found</p>
        </div>
    </div>
    <?php
$content = ob_get_clean();
include 'layout.php';