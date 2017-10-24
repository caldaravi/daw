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
<header class="b">
			<ul class="no-style b">
	
				<li class="b" id="logoLi">
					<!-- / #logo-header -->
					<a href="index.php">
						<img id="logo" src="images/logo.png" alt="logo">
					</a>
				</li>
	
				<li class="b" id="regLi">
					<a id="botonRegId" href="nuevoReg.php">Regístrate</a>
				</li>
	
				<li class="b" id="buscarLi">
					<form action="formBusqueda.php" method="get">
						<label>
							<input type="text" placeholder="Busca fotos">
						</label>
						<input type="Submit" value="Buscar">
					</form>
				</li>
	
				<li class="b" id="formregLi">

					<?php include("includes/login.php");?>
					
				</li>
				<li id="loginicon">
						<a>
								<img id="loginimg" src="https://image.flaticon.com/icons/png/512/64/64572.png" alt="login icon">
						</a>
				</li>
			</ul>
		</header>