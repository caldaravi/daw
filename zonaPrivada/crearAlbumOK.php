<?php 
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['textadic'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['paises'];
    $usuario = $_SESSION['username'];
    

$queryID = "SELECT idUsuario FROM usuarios u WHERE u.userName = '$usuario'";
$result = mysqli_query($connectDB, $queryID);


if (!$result) 
    die(mysqli_error($connectDB));
else
    $row_cnt = mysqli_num_rows($result);

if ($row_cnt >= 1) {
//success
global $id;
    $fila = mysqli_fetch_assoc($result);
    
    $id = $fila['idUsuario'];
}
else{
    echo "sin result";
}

    $query = "INSERT INTO Albumes(Titulo, Descripcion, Fecha, Pais, Usuario) 
            VALUES('$titulo', '$descripcion', '$fecha', '$pais', '$id')";

    if ($connectDB->query($query) === TRUE) {
?>
        <div class="card">
        <p class="pCentrado">
            Álbum creado con éxito.
        </p>
        <div id="botones">
            <a class="vBtn" href=<?php echo $urlLocal . 'zonaPrivada/verAlbum.php'?>>Ver álbum</a>
        </div>
    </div>
    <?php
    }
    else{
        echo "error al crear album";
    }

    mysqli_close($connectDB);