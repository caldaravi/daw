<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;

    require_once('sesion/sesion.php');
?>
<!-- FIN CABECERA  ?> -->
<?php 
/* ---- Base de datos temporal ---- */ 
$fotos = array
(
array(1,"Buenas&nbspvistas","29/09/2017","Afganistan", "Pepe", "Album de vacaciones"),
array(2,"Kite&nbsp;for&nbsp;life","17/06/2017","España", "Alberto", "Album de deportes"),
array(3,"BOOM","08/04/2017","Perú","Paco", "Album de Perú"),
array(4,"Good&nbsp;views","12/02/2017","Rio%20Janeiro","Alberto", "Mi album"),
array(5,"Life&nbsp;style","03/01/2017","Bali","Andres", "Album de mi vida"),
);
?>
    <main>   
        <div id="infofoto">
<<<<<<< HEAD
         <h2>Titulo: <?php echo $fotos[$_GET["id"]][1].' (id='.$_GET["id"].')'?></h2>
                <?php if( $_GET["id"]%2==0 ){
                    echo '<img src="images/mountain.jpg" alt="Imagen" style="margin-bottom: 10px;">';}
                    else{
                    echo '<img src="images/surf.jpg" alt="Imagen" style="margin-bottom: 10px;">';}
                    ?>
                
=======
         <h2>Titulo: <?php echo $fotos[0][1]?></h2>
           
                <img src="images/mountain.jpg" alt="Imagen" style="margin-bottom: 10px;">
>>>>>>> 1a2bbe378d6eb39a0076a4c21bc316725d986508
            <table>
                <tr>
                    <td>Fecha <?php echo $fotos[0][2]?></td>
                    <td>País <?php echo $fotos[0][3]?></td>
                </tr>
                <tr>
                    <td>Álbum <?php echo $fotos[0][5]?></td>
                    <td>Usuario <?php echo $fotos[0][4]?></td>
                </tr>
            </table>
        </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->