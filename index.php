<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="generator" content="Bloc de notas" /> 
	<meta name="author" content="Carlos y Marcos" /> 
	<meta name="keywords" content="HTML5, web" /> 
	<meta name="description" content="Esta es la pagina creada para las practicas de la asignatura de DAW" /> 

	<title>PI - Pictures & Images</title>

	<link rel = "stylesheet" type = "text/css" href = "css/estilo.css" media="screen" />
	<link rel = "stylesheet" type = "text/css" href = "css/impresion.css" media="print"/> 
	<link rel = "stylesheet" type = "text/css" href = "css/adapter.css" title="Estilo accesible" media="adapter"/> 
	<link rel = "stylesheet" type = "text/css" href = "css/responsive.css" media="handheld" />
</head>
<body>
	<!-- CABECERA -->
    	<?php include("includes/header.html"); ?>
	<!-- FIN CABECERA -->   
    	
		
	<main>
	<!-- GALERIA DE IMAGENES -->
		<ul class="galeria">
			<li class="foto">
				<h2>Buenas vistas</h2>
				<a href="infIMG.php">
					<img src="images/mountain.jpg" alt="Imagen">
				</a>
				<p>
					29/09/2017
				</p>

				<p>
					Afganistán
				</p>
			</li>
			<li class="foto">
				<h2>Kite for life</h2>
				<a href="infIMG.php">
					<img src="images/kite.jpg" alt="Imagen">
				</a>
				<p>
					17/06/2017
				</p>
				<p>
					España
				</p>
			</li>
			<li class="foto">
				<h2>BOOM</h2>
				<a href="infIMG.php">
					<img src="images/volcan.jpg" alt="Imagen">
				</a>
				<p>
					08/04/2017
				</p>
				<p>
					Perú
				</p>
			</li>
			<li class="foto">
				<h2>Good views</h2>
				<a href="infIMG.php">
					<img src="images/caribe.jpg" alt="Imagen">
				</a>
				<p>
					12/02/2017
				</p>
				<p>
					Rio Janeiro
				</p>
			</li>
			<li class="foto">
				<h2>Life style</h2>
				<a href="infIMG.php">
					<img src="images/surf.jpg" alt="Imagen">
				</a>	
				<p>
					03/01/2017
				</p>
				<p>
					Bali
				</p>
			</li>
		</ul>
		
		
		<!-- FIN GALERIA -->
	</main>
	

	<!-- PÍE DE PÁGINA -->
		<?php include("includes/footer.html"); ?>
	<!-- FIN PÍE -->

</body>
</html>