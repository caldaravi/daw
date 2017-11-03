<!-- CABECERA -->
<?php
    session_start(); 
	require_once('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->

    <main>
        <form class="card" action="resBusqueda.php" method="get">
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
            
            <?php require_once('db/paises.php'); ?>

            <input type="submit" value="Buscar">
        </form>
    </main>
    
<!-- PÍE DE PÁGINA -->
    <?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->