<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->  

<main>
        <form class="card" method="post" action="addFotoOK.php">
            <p><label>Título
                <input type="text" name="titulo" required>
            </label></p>
            <p><label>Fecha
                <input type="date" name="fecha" required>
            </label></p>
            <?php   require_once($urlLocal . 'db/albumesOption.php'); ?>
            <?php   require_once($urlLocal . 'db/paises.php'); ?>
            <fieldset style="margin-bottom: 5px;">
            <legend>Foto</legend>
            <div>
                <input name="image" type="file" accept="image/*" id="menu_images" required/>
            </div>
            </fieldset>
            <input type="submit" value="Agregar foto" /></p>
        </form>
</main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php");?>
<!-- FIN PÍE -->