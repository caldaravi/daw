<?php

$user = $_SESSION['username'];

require_once('connect.php');

if($connectDB){
    $query = 
    "   SELECT Fichero, f.Titulo, f.Fecha, NomPais, IdFoto 
        FROM Fotos f, usuarios u, Paises p, Albumes a 
        WHERE u.userName = '$user' AND p.IdPais=f.Pais  AND a.Usuario=u.userName";

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