<!-- CABECERA -->
<?php
    require('includes/cabecera.inc');
    require('includes/controlAcceso.php');
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
    <?php require("includes/pie.inc"); ?>
<!-- FIN PÍE -->