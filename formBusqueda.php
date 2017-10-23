<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="generator" content="Bloc de notas" />
    <meta name="author" content="Carlos y Marcos" />
    <meta name="keywords" content="HTML5, web" />
    <meta name="description" content="Practica DAW" />
    <title>PI - Pictures & Images</title>
    <link rel = "stylesheet" type = "text/css" href = "css/estilo.css" />
</head>
<body>
	<!-- CABECERA -->
		<?php include("includes/header.html"); ?>
	<!-- FIN CABECERA -->   
    <main>
        <form class="card" action="resBusqueda.php" method="get">
            
            <label>Título:<br>
                <input type="text" name="titulo">
            </label>
            <br> 
            
            <label>Fecha:<br>
                <input type="text" name="fecha">
            </label>
            <br>
            
            <label>País:<br>
                <input type="text" name="pais">
            </label>
            <br>
            <input type="submit" value="Buscar">
        </form>
    </main>
	<!-- PÍE DE PÁGINA -->
		<?php include("includes/footer.html"); ?>
	<!-- FIN PÍE -->

</body>

</html>