<!-- CABECERA -->
<?php
    require_once('sesion/sesion.php');
	require_once('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
    <div class="card">
        <h1>Perfil</h1>
        <p>Nombre: <?php echo $_SESSION['username']; ?> </p>
        <p>Apellidos: Pepito García</p>
        <p>Mis álbumes</p>
        <p><a href="crearAlbum.php">Crear álbum</a></p>
        <p><a href="solicitarAlbum.php">Solicitar álbum</a></p>
        <p><a href="?salir=true"> Salir</a></p>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once("includes/pie.inc");
//<!-- FIN PÍE -->

if(isset($_GET['salir']))
{
    $_SESSION = array(); 
    setcookie('username', null, -1);
    setcookie('password', null, -1);
    setcookie("hour", null, -1);
    setcookie("day", null, -1);
    session_destroy();
    header('location: index.php');
}
?>