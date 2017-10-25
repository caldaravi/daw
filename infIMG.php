<!DOCTYPE html>
<html lang="es">
<!-- CABECERA -->
<?php 
session_start();
require("includes/controlAcceso.php");
	if (isset($_SESSION['login'])) {
		require("includes/headerLogged.php");
	} else {
		require("includes/header.php");
	}
?>
<!-- FIN CABECERA -->     

    <main>   
        <div id="infofoto">
        
            <h2><?php echo $_GET["titulo"]?></h2>
                <img src="images/mountain.jpg" alt="Imagen" style="margin-bottom: 10px;">
            <table>
                <tr>
                    <td>Fecha <?php echo $_GET["fecha"]?></td>
                    <td>País <?php echo $_GET["pais"]?></td>
                </tr>
                <tr>
                    <td>Álbum <?php echo "desconocido"//$_GET["album"]?></td>
                    <td>Usuario <?php echo $_GET["usuario"]?></td>
                </tr>
            </table>
        </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->