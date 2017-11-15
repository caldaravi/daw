<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
    
	require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->

    <main>
        <form class="card" action="resBusqueda.php" method="post">
            <p>
            <label>Título:<br>
                <input type="text" name="titulo">
            </label>
            </p> 
            <p>
            <label>Fecha:<br>
                <input type="text" name="fecha">
            </label>
            </p>
            
            <?php require_once($urlLocal . 'db/paises.php'); ?>

            <input type="submit" value="Buscar">
        </form>
    </main>
    
<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->