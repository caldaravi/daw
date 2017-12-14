<?php 
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
    require_once($urlLocal . 'includes/funciones.php');

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['textadic'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['paises'];
    $usuario = $_SESSION['username'];
    
    if(isset($titulo)){
        if (!preg_match('/[aA-zZ]*[0-9]/', $titulo) ){
            error('El título del álbum contiene caracteres no permitidos.', 'zonaPrivada/crearAlbum.php');
        }
    }
    else{
        error("Por favor introduzca un titulo. ", "zonaPrivada/crearAlbum.php");
    }

$queryID = "SELECT idUsuario, NomPais FROM usuarios u, paises p WHERE u.userName = '$usuario' AND p.IdPais = '$pais' " ;

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
    $idpais = $fila['NomPais'];
}
else{
    echo "sin result";
}

    $query = "INSERT INTO Albumes(Titulo, Descripcion, Fecha, Pais, Usuario) 
            VALUES('$titulo', '$descripcion', '$fecha', '$pais', '$id')";

    if ($connectDB->query($query) === TRUE) {
echo
        '<div class="card">
        <p class="pCentrado">
            <h2>Álbum creado con éxito.</h2>
            <p> Titulo: ' . $titulo . '</p>
            <p> Descripcion: ' . $descripcion . '</p>
            <p> Fecha: ' . $fecha . '</p>
            <p> País: ' . $idpais . '</p>
        </p>
        <div id="botones">
            <a class="button" href=' . $urlLocal . 'zonaPrivada/usuarioReg.php>Volver al perfil</a>
        </div>
    </div>';
    }
    else{
        echo '<div class="card"> <p>Se ha producido un error al crear álbum</p></div>';
    }

    mysqli_close($connectDB);