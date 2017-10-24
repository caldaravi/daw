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
            Mostrando 1 resultado
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