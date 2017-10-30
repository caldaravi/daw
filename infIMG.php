<!-- CABECERA -->
<?php
    require_once('sesion/sesion.php');
    require_once('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->

    <main>   
        <div id="infofoto">
         <h2>Titulo<?php echo $_GET["titulo"]?></h2>
           
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
    <?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->