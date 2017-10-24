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
        <div class="card">
            <form>
                <h2>Se ha registrado la solicitud del álbum satisfactoriamente</h2>
                <br> Nombre:
                <br> Título del álbum:
                <br> Texto adicional:
                <br> Color de portada:
                <br> Número de copias:
                <br> El coste es de X.
                <br>
            </form>
            <br>

            <a href="usuarioReg.php">Volver al perfil</a>

            <br>
            <br>
            <br>
            <br>
        </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php require("includes/footer.html"); ?>
<!-- FIN PÍE -->