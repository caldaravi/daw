<?php

require_once('connect.php');

if($connectDB){
    $query = 
    "   SELECT Titulo, Fecha, Pais, Fichero, IdFoto, NomPais   
        FROM Fotos, Paises 
        WHERE Paises.IdPais=Fotos.Pais order by FRegistro desc limit 5";
    
    
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
        echo '<div class="card" ><p> No se han encontrado albumes. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}
?>