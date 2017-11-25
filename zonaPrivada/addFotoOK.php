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
    $idPais;

$queryID = "SELECT idUsuario, IdAlbum, NomPais 
FROM usuarios u, Albumes a, Paises p, Fotos f
WHERE u.userName = '$usuario' AND a.Usuario = u.IdUsuario AND a.IdAlbum = '$album' AND p.IdPais = '$pais'";
    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");
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
    $idPais = $fila['NomPais'];
}
else{
    echo "sin result";
}

    $query = "INSERT INTO Fotos(Titulo, Fecha, Pais, Album, Fichero) 
            VALUES('$titulo', '$fecha', $pais, $id, '$fichero')";

    if ($connectDB->query($query) === TRUE) {
echo '
        <div class="card">
        <p class="pCentrado">
            <h2>Foto agregada con éxito.</h2>
        </p>
        <p>Título: ' . $titulo . '</p>
        <p>Fecha: ' . $fecha . '</p>
        <p>País: ' . $idPais . '</p>
        
        <div id="botones">
            <a class="vBtn" href=' . $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $album . '>Ver álbum</a>
        </div>
    </div>
    ';
    }
    else{
        echo '<div class="card"> <p>Se ha producido un error al agregar la foto al álbum</p></div>';
    }

    mysqli_close($connectDB);