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
					
	<main>
		<p class="card">
			Somos un grupo haciéndo las prácticas correspondientes de HTML, CSS Y PHP que pertenecen a la asignatura DAW.
		</p>
	</main>
	
<!-- PÍE DE PÁGINA -->
	<?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->