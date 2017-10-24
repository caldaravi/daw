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

    <main class="center">   
        <div class="card">
        
            <h2>Buenas vistas</h2>
                <img src="images/mountain.jpg" alt="Imagen">
            <table>
                <tr>
                    <td>Fecha</td>
                    <td>País</td>
                </tr>
                <tr>
                    <td>Álbum</td>
                    <td>Usuario</td>
                </tr>
            </table>
        </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->