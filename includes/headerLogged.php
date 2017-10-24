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
        
                <li class="b" id="regLiLogged">
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

                
                    <a href="UsuarioReg.php" class="iconosCabecera"> <img id="userIcon" src="images/user.png" width="40px" > </a>
                    <a href="?logout=true" class="iconosCabecera"> <img id="logoutIcon" src="images/logout.png" width="40px" > </a>
                
        
                <li class="b" id="formregLiLogged">
                    <form  action="usuarioReg.php">
                        <label>
                            <b>Usuario</b>
                            <input type="text" placeholder="Usuario" name="uname" required>
                        </label>
                        
                        <label>
                            <b>Contraseña</b>
                            <input type="password" placeholder="Contraseña" name="pass" required>
                        </label><br>
                        <input id="login" type="submit" value="Login">
                        <label>
                            <input id="recordar" type="checkbox" checked="checked"> Recordar
                        </label>
                        <a id="psw" class="exception" href="solicitudPass.php">Contraseña olvidada?</a>
                    </form>
                </li>
            </ul>
        </header>
<!--USER LOGOUT-->
<?php 
if(isset($_GET['logout']))
{
    unset($_SESSION['login']);
    header("location: index.php");
}
?>