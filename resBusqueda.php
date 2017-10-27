<!-- CABECERA -->
<?php
    require_once('includes/cabecera.inc');
	require_once('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->

    <main>
        <div class="card">
        <p>
            Mostrando resultados para
            <?php 
            if(isset($_GET['titulo'])){ $titulo=$_GET['titulo']; echo ' el título ' . $titulo ;} 
            if(isset($_GET['fecha'])){ $fecha=$_GET['fecha']; echo ' con la fecha ' . $fecha;}
            if(isset($_GET['pais'])){ $pais=$_GET['pais']; echo ' y el país ' . $pais;} 
            ?>
        </p>

        <h2>Título Imagen 1</h2>
        <?php echo '<a href="infIMG.php?titulo='.$titulo.'&pais='.$pais.'&fecha='.$fecha.'&album=1&usuario=pepe">' ?>
            <img src="images/mountain.jpg" alt="Imagen">
        </a>
        <p>
            Fecha: <?php echo $fecha?>
        </p>
        <p>
            País: <?php echo $pais?>
        </p>
    </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->