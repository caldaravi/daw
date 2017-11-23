<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

    $precio = 0;
    $numFotos = 0;
?>
<!-- FIN CABECERA  ?> -->
<?php
    if($connectDB){ 
        $user = $_SESSION['username'];
        $album = $_POST['albumes'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['textadic'];
        $titulo = $_POST['album'];
        $email = $_POST['email'];
        $calle = $_POST['calle'];
        $puerta = $_POST['puerta'];
        $numero = $_POST['numero'];
        $ciudad = $_POST['ciudad'];
        $provincia = $_POST['provincia'];
        $codpostal = $_POST['cpostal'];
        $color = $_POST['favcolor'];
        $copias = $_POST['copias'];
        $resolucion = $_POST['resfoto'];
        $fecha = $_POST['fecentrega'];
        if(isset($_POST['impColor']))
            $icolor = true;
        else
            $icolor = false;
        

        $query = 
        "SELECT f.Titulo, a.Titulo, IdFoto, Fichero, f.Fecha, NomPais, u.userName 
        FROM Fotos f, Albumes a, Paises p, usuarios u
        WHERE f.Album = a.IdAlbum AND p.IdPais = f.Pais AND u.userName = '$user' AND a.Usuario = u.IdUsuario";
    
        $result = mysqli_query($connectDB, $query);
    
        if (!$result) {
            die(mysqli_error($connectDB));
        }
        else{
            $row_cnt = mysqli_num_rows($result);
        }
        if ($row_cnt >= 1) {
            $numFotos = $row_cnt;
        }

        $precio = calculaTotal($precio);

        $query = "INSERT INTO Solicitudes(Album, Nombre, Titulo, Descripcion, Email, Calle, Numero, Puerta, Ciudad, Provincia, CodPostal, Color, Copias, Resolucion, Fecha, IColor, Coste) 
        VALUES('$album', '$nombre', '$titulo', '$descripcion', '$email', '$calle', '$numero', '$puerta', '$ciudad', '$provincia', '$codpostal', '$color', '$copias', '$resolucion', '$fecha', '$icolor', '$precio')";

    if ($connectDB->query($query) === TRUE) {
        if($numFotos > 0){
?>
    <main>
        <div class="card">
            <form>
                <h2>Se ha registrado la solicitud del álbum satisfactoriamente</h2>
                <p>Nombre: <?php echo $_POST['nombre']; ?></p>
                <p>Título del álbum: <?php echo $_POST['album']; ?></p>
                <p>Texto adicional: <?php echo $_POST['textadic']; ?></p>
                <p >Color de portada: <?php echo "<pre style='width: 15px; height: 15px; background-color:".$_POST['favcolor']."'> </pre>"; ?></p>
                <p>Número de copias: <?php echo $_POST['copias']; ?></p> 
                <p>Número de fotos en el álbum: <?php echo $numFotos; ?></p> 
                <p>Total: <?php echo $precio ?> € </p>
            </form>
            <p><a href="usuarioReg.php">Volver al perfil</a></p>
        </div>
    </main>
        <?php } else {
            echo "<div class='card'> <p style='text-align:center'>No se ha podido solicitar el álbum porque éste está vacío.</p></div>";
        }
} else {
     echo "<p>Something went wrong, try again later...</p>"; 
     echo "error: " . mysqli_error($connectDB) . "<br>";
     echo "errno: " . mysqli_errno($connectDB);
     exit;
    }
}
?>
<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->

<!-- PRECIO TOTAL -->
<?php 

function calculaTotal(){
    $numPaginas = 2;
    
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