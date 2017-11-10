<?php  

    if(isset($_SESSION['contador'])) { 
        $_SESSION['contador'] = $_SESSION['contador'] + 1; 
    } else { 
        $_SESSION['contador'] = 1; 
    } 
  
    if(isset($_COOKIE['username']) && $_SESSION['contador'] == 1){
          header('location: ' . $urlLocal . 'includes/ventanaRecordando.php');
    }

    if(!isset($_SESSION['username'])){
        require_once($urlLocal . 'includes/header.php');
        
        if($zonaPrivada == true){ 
        ?>
        
        <p class="card">Debes iniciar sesión para acceder a este contenido<br><br>

        <a class="card" href=<?php echo $urlLocal.'index.php'?>>Volver a inicio</a></p>
    <!-- PÍE DE PÁGINA -->
        <?php include_once($urlLocal . "includes/pie.php"); ?>
    <!-- FIN PÍE -->
        <?php
        die();
        }
           
    } else {
        require_once($urlLocal . 'includes/headerLogged.php');
    }
?>
