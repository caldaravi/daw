<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = false;
    $urlLocal = "../";

	require_once($urlLocal . 'sesion/sesion.php');
    
    $fotos = array
    (
    array(1,"Buenas&nbspvistas","29/09/2017","Afganistan", "Pepe", "Album de vacaciones"),
    array(2,"Kite&nbsp;for&nbsp;life","17/06/2017","España", "Alberto", "Album de deportes"),
    array(3,"BOOM","08/04/2017","Perú","Paco", "Album de Perú"),
    array(4,"Good&nbsp;views","12/02/2017","Rio%20Janeiro","Alberto", "Mi album"),
    array(5,"Life&nbsp;style","03/01/2017","Bali","Andres", "Album de mi vida"),
    );
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
        <?php echo '<a href="' . $urlLocal . 'zonaPrivada/infIMG.php?titulo='.$titulo.'&pais='.$pais.'&fecha='.$fecha.'&album=1&usuario=pepe">' ?>
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
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->