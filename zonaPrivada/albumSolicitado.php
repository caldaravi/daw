<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    $precio = 0;
?>
<!-- FIN CABECERA  ?> -->
    <main>
        <div class="card">
            <form>
                <h2>Se ha registrado la solicitud del álbum satisfactoriamente</h2>
                <p>Nombre: <?php echo $_POST['nombre']; ?></p>
                <p>Título del álbum: <?php echo $_POST['album']; ?></p>
                <p>Texto adicional: <?php echo $_POST['textadic']; ?></p>
                <p >Color de portada: <?php echo "<pre style='width: 15px; height: 15px; background-color:".$_POST['favcolor']."'> </pre>"; ?></p>
                <p>Número de copias: <?php echo $_POST['copias']; ?></p>
                <p>Total: <?php echo calculaTotal($precio); ?> € </p>
            </form>
            <p><a href="usuarioReg.php">Volver al perfil</a></p>
        </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->

<!-- PRECIO TOTAL -->
<?php 

function calculaTotal(){
    $numPaginas = 2;
    $numFotos = 10;
    
    if($numPaginas < 5){
        $precio = $numPaginas * 0.10;
    }
    else{ 
        if($numPaginas < 11){
            $precio = $numPaginas * 0.08;
        }
        else{
            $precio = $numPaginas * 0.07;
        }
    }
    if(isset($_POST['impColor'])){
        $precio = $precio + ($numFotos * 0.05);
    }
    if($_POST['resfoto'] > 300){
        $precio = $precio + ($numFotos * 0.02);
    }
    if($_POST['copias'] > 1){
        $precio = $precio * $_POST['copias'];
    }
    return $precio;
}
?>