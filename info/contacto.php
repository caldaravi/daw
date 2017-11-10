<!-- CABECERA -->
<?php
	session_start();
	
	$zonaPrivada = false;
	$urlLocal = "../";
	
	require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  
					
	<main>
		<p class="card">
			Somos un grupo de la universidad de Alicante haciéndo las prácticas correspondientes a la asignatura
			de Desarrollo de Aplicaciones Web con el contenido de HTML, CSS Y PHP.
		</p>
	</main>
	
<!-- PÍE DE PÁGINA -->
	<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->