<!-- CABECERA -->
<?php
	session_start();
	
	$zonaPrivada = false;
	$urlLocal ="";

	require_once('sesion/sesion.php');
	require_once('db/connect.php');
?>
<!-- FIN CABECERA  -->   
		
	<main>

		<!-- Fotos seleccionadas-->
			<?php  require_once($urlLocal . "db/seleccion.php"); ?>

		<!-- GALERIA DE IMAGENES -->
		<ul class="galeria">
			<?php require_once($urlLocal . "db/fotos.php"); ?>
		</ul>
		
	</main>
	
<!-- PÍE DE PÁGINA -->
	<?php include_once("includes/pie.php"); ?>
<!-- FIN PÍE -->