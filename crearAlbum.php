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
<!-- FIN CABECERA  ?> -->   
<form class="card" method="post">
    <p><label>Título
        <input type="text" name="titulo" required>
    </label>
    <p><label>Descripción
        <textarea rows="3" cols="30" name="textadic" maxlength="4000" placeholder="Enter your text here"></textarea>
    </label>
    <p><label>Fecha
        <input type="date" name="fecha" required>
    </label>
    <p><label>País
        <input type="text" name="pais" required>
    </label>
    <p><input type="submit" value="Crear" /></p>
</form>