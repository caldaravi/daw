<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = false;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
    <div class="card">
        <h1>Cuenta eliminada</h1>
        <p>Su cuenta se ha eliminado correctamente, le esperamos de vuelta pronto.</p>
        <div id="botones">
            <a class="button" href=<?php echo $urlLocal . 'index.php'?>>Página principal</a>
        </div>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->