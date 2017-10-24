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
        <h1>Perfil</h1><br> Nombre: Antonio 
        <br> Apellidos: Pepito García
        <br> Mis álbumes:<br> Crear álbum<br>
        <a href="solicitarAlbum.php">Solicitar álbum</a><br><br>
        <a href="index.php"> Salir</a><br><br><br><br>
    </div>
</main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->