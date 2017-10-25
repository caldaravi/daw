<?php session_start(); ?>

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
<?php
    $usuario1 = 'carlos';   $pw1 = 'carlos';
    $usuario2 = 'marcos';   $pw2 = 'marcos';
    $usuario3 = 'admin';    $pw3 = 'admin';

    if(isset($_POST['username'])){
        if(($_POST['username'] == $usuario1 && $_POST['password'] == $pw1) || 
            ($_POST['username'] == $usuario2 && $_POST['password'] == $pw2) ||
            ($_POST['username'] == $usuario3 && $_POST['password'] == $pw3)){
            $_SESSION['username'] = $_POST['username'];
            include('includes/headerLogged.php');
        }
        else{
            include('includes/header.php');
            ?> <p style="float: right;"> Usuario o contraseña incorrecta </p> <?php
        }
    } else {
        if(isset($_SESSION['username'])){
            include('includes/headerLogged.php');
        }
        else {
            include('includes/header.php');
        }
    }
?>
</body>
</html>