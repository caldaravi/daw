<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
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
    <?php require_once($urlLocal . 'db/paises.php'); ?>
    <input type="submit" value="Crear" /></p>
</form>
<!-- PÍE DE PÁGINA -->
<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->