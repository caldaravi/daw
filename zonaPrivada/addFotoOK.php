<?php 
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['paises'];
    $usuario = $_SESSION['username'];
    $album = $_POST['albumes'];
    $fichero = "images/" . $_POST['image'];

$queryID = "SELECT idUsuario, IdAlbum 
FROM usuarios u, Albumes a 
WHERE u.userName = '$usuario' AND a.Usuario = u.IdUsuario AND a.IdAlbum = '$album'";
$result = mysqli_query($connectDB, $queryID);

if (!$result) 
    die(mysqli_error($connectDB));
else
    $row_cnt = mysqli_num_rows($result);

if ($row_cnt >= 1) {
//success
global $id;
    $fila = mysqli_fetch_assoc($result);
    
    $id = $fila['IdAlbum'];
}
else{
    echo "sin result";
}

    $query = "INSERT INTO Fotos(Titulo, Fecha, Pais, Album, Fichero) 
            VALUES('$titulo', '$fecha', '$pais', '$id', '$fichero')";

    if ($connectDB->query($query) === TRUE) {
?>
        <div class="card">
        <p class="pCentrado">
            Foto agregada con éxito.
        </p>
        <div id="botones">
            <a class="vBtn" href="<?php echo $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $album . '">'?>Ver álbum</a>
        </div>
    </div>
    <?php
    }
    else{
        echo "error al crear album";
    }

    mysqli_close($connectDB);