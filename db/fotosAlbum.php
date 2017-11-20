<?php

$user = $_SESSION['username'];
$id = $_GET['id'];

require_once('connect.php');

if($connectDB){
    $query = 
        "SELECT f.Titulo, a.Titulo, IdFoto, Fichero, f.Fecha, NomPais 
        FROM Fotos f, Albumes a, Paises p
        WHERE a.IdAlbum = '$id' and f.Album = a.IdAlbum AND p.IdPais = f.Pais";

    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");

    $result = mysqli_query($connectDB, $query);
   
    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($result);
    }
    if ($row_cnt >= 1) {
    //success
        while($fila = mysqli_fetch_assoc($result)) { 
            echo '
                <li class="foto">
                
                <h2>' . $fila["Titulo"] . ' </h2>
                <a href="' . $urlLocal . 'zonaPrivada/infIMG.php?id=' . $fila["IdFoto"] . '">
                    <img src="' . $urlLocal . $fila["Fichero"] . '" alt="Imagen"/>
                </a>
                <p>
                   ' . $fila["Fecha"] . '
                </p>
                <p>
                   ' . $fila["NomPais"] . '
                </p>
                
                </li>
            ';
            
        }
    } else {
    //Fail
        echo '<div class="card" ><p> No hay fotos en este álbum. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}
?>