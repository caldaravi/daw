<?php  
    session_start();
    if(!isset($_SESSION['username'])){
        require_once('includes/cabecera.inc');
        require_once('includes/header.php');
        ?>
        
        <p class="card">Debes iniciar sesión para acceder a este contenido<br><br>
        <a class="card" href="index.php">Volver a inicio</a></p>
    
        <?php
        die();
    }
?>