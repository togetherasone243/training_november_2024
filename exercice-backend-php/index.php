<?php
if ($_SERVER['REQUEST_URI'] == '/home') {
    include 'views/home.php';
} else {
   include 'views/404.php';
}
?>