<!-- CABECERA -->
<?php 
session_start();
require("includes/controlAcceso.php");
	if (isset($_SESSION['login'])) {
		require("includes/headerLogged.php");
	} else {
		require("includes/header.php");
	}
?>
<!-- FIN CABECERA -->     

    <main class="center">
        <div class="card">
        <p>
            Mostrando resultados para
            <?php 
            if(isset($_GET['titulo'])){ echo ' el título ' . $_GET['titulo'];} 
            if(isset($_GET['fecha'])){ echo ' con la fecha ' . $_GET['fecha'];}
            if(isset($_GET['pais'])){ echo ' y el país ' . $_GET['pais'];} 
            ?>
        </p>

        <h2>Título Imagen 1</h2>
        <a href="infIMG.php">
            <img src="images/mountain.jpg" alt="Imagen">
        </a>
        <p>
            Fecha
        </p>
        <p>
            País
        </p>
    </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->