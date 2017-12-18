<?php 
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
    require_once($urlLocal . 'includes/funciones.php');

    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['paises'];
    $usuario = $_SESSION['username'];
    $album = $_POST['albumes'];
    $idPais;
    $id;
$queryID = "SELECT IdUsuario, IdAlbum, NomPais 
FROM usuarios u, Albumes a, Paises p
WHERE u.userName = '$usuario' AND a.Usuario = u.IdUsuario AND a.IdAlbum = '$album' AND p.IdPais = '$pais'";

$result = mysqli_query($connectDB, $queryID);

if (!$result) 
    die(mysqli_error($connectDB));
else
    $row_cnt = mysqli_num_rows($result);
if ($row_cnt >= 1) {
//success
    $fila = mysqli_fetch_assoc($result);
    
    $id = $fila['IdAlbum'];
    $idPais = $fila['NomPais'];
}
else{
    echo "Sin resultados.";
}   

    $date = date('Y-m-d H:i:s');

    $date = new DateTime($date);
    $datestr = date_timestamp_get($date);

    $path = $_FILES['image']['name'];
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    // -- ruta del archivo:
    $ruta = $urlLocal . "images/Albumes/";
    //$titulo_ = str_replace(' ', '_', $titulo);
    $filename = $_SESSION['username'] . "_" . $id . "_" . $datestr . "." . $extension;

    // Comprobamos la foto de perfil
    $msgError = array(0 => "No hay error, el fichero se subió con éxito", 
    1 => "El tamaño del fichero supera la directiva 
    upload_max_filesize el php.ini", 
    2 => "El tamaño del fichero supera la directiva 
    MAX_FILE_SIZE especificada en el formulario HTML", 
    3 => "El fichero fue parcialmente subido", 
    4 => "No se ha subido un fichero", 
    6 => "No existe un directorio temporal", 
    7 => "Fallo al escribir el fichero al disco", 
    8 => "La subida del fichero fue detenida por la extensión"); 
    
    if($_FILES["image"]["error"] > 0) 
    { 
        echo "Error: " . $msgError[$_FILES["image"]["error"]] . "<br />"; 
        die();
    } 
    else 
    { 
        if(file_exists( $ruta . $filename ) )
        { 
            echo $filename . " ya existe";
            die();
        } 
        else 
        { 
            $destino = $ruta . $filename;

            move_uploaded_file($_FILES["image"]["tmp_name"], $destino);
        
        //echo "Almacenado en: " . $destino;

        setcookie("Foto", $filename);
        } 
    }

    // Comprobamos datos del titulo de la fotoecho $titulo;
    if(isset($titulo)){
        if (!preg_match('/[aA-zZ]*[0-9]*/', $titulo) ){
            error('El título de la foto contiene caracteres no permitidos.', 'zonaPrivada/addFoto.php');
        }
    }
    else{
        error("Por favor introduzca un titulo de foto. ", "zonaPrivada/crearAlbum.php");
    }


    $query = "INSERT INTO Fotos(Titulo, Fecha, Pais, Album, Fichero) 
            VALUES('$titulo', '$fecha', $pais, $id, '". $filename ."')";

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
            <a class="button" href=' . $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $album . '>Ver álbum</a>
        </div>
    </div>
    ';
    }
    else{
        echo '<div class="card"> <p>Se ha producido un error al agregar la foto al álbum</p></div>';
    }

    mysqli_close($connectDB);