<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
        <div id="card">
            <?php require_once($urlLocal . 'db/fotosAlbum.php'); ?>
        </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->