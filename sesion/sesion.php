<?php  
    if(isset($_SESSION['contador'])) { 
        $_SESSION['contador'] = $_SESSION['contador'] + 1; 
    } else { 
        $_SESSION['contador'] = 1; 
    } 
  
    if(isset($_COOKIE['username']) && $_SESSION['contador'] == 1){
          header('location: includes/ventanaRecordando.php');
    }

    if(!isset($_SESSION['username'])){
        require_once('includes/header.php');
        
        if($zonaPrivada == true){
        ?>
        
        <p class="card">Debes iniciar sesión para acceder a este contenido<br><br>
        <a class="card" href="index.php">Volver a inicio</a></p>
    
        <?php
        die();
        }
           
    } else {
        require_once('includes/headerLogged.php');
    }
?>