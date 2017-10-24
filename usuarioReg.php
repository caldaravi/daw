<!-- CONTROL ACCESO -->
<?php 
session_start();
require("includes/controlAcceso.php");
	if (isset($_SESSION['login'])) {
		require("includes/headerLogged.php");
	} else {
		require("includes/header.php");
	}
?>
<!-- CABECERA -->
    
<!-- FIN CABECERA -->    

<main>
    <div class="card">
        <h1>Perfil</h1>
        <p>Nombre: Antonio </p>
        <p>Apellidos: Pepito García</p>
        <p>Mis álbumes</p>
        <p><a href="crearAlbum.php">Crear álbum</a></p>
        <p><a href="solicitarAlbum.php">Solicitar álbum</a></p>
        <p><a href="index.php"> Salir</a></p>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->