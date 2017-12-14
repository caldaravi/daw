<?php

$urlLocal ="";

require_once('connect.php');

// Leer el fichero de fotos seleccionadas
$count = 0;
$gestor = fopen($urlLocal . "db/seleccionadas.txt", "r");

// Array que almacena las fotos seleccionadas y su informacion
$seleccionadas[][] = null;

while ($userinfo = fscanf($gestor, "%s\t%s\t%[^\n]s\t")) {
    list ($ruta, $critico, $opinion) = $userinfo;
    //echo "r: " . $ruta . " c: " . $critico . " o: " . $opinion . "<br>" ; 
    $seleccionadas[$count][0] = $ruta;
    $seleccionadas[$count][1] = $critico;
    $seleccionadas[$count][2] = $opinion;
    ++$count;
}
fclose($gestor);
$aleatorio = mt_rand(0, $count-1);
//echo $seleccionadas[$aleatorio][0];
if($connectDB){
    $query = "SELECT f.Titulo as fTitulo, a.Titulo as aTitulo, f.Descripcion, f.Fecha, p.NomPais as nomPais, Album, userName 
        FROM usuarios u, Fotos f, Albumes a, Paises p
        WHERE f.Fichero = '" . $seleccionadas[$aleatorio][0] . "' 
        AND a.IdAlbum = f.Album
        AND f.Pais = p.IdPais
        ";

    $result = mysqli_query($connectDB, $query);

    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $fila = mysqli_num_rows($result);
    }
    $row = mysqli_fetch_assoc($result);
    echo "
    <nav>
        <div id='navseleccionadas'>
            <img src='" . $urlLocal . "images/Albumes/" . $seleccionadas[$aleatorio][0] ."'>
            <div id='navinfo'> <p>Crítico: " . $seleccionadas[$aleatorio][1] ."</br>
                    Opinión: " . $seleccionadas[$aleatorio][2] . "<br>
                    Título: " . $row['fTitulo'] . "  </br>
                    Album: " . $row['aTitulo'] . " 
                    Fecha: " . $row['Fecha'] . "</br>
                    Pais: " . $row['nomPais'] . "  
                    Usuario: " . $row['userName'] . "</br>
                    </p>
            </div>
        </div>
    </nav>";
}

// !!!!!!!!!!!!!!!!!

// Busca foto en la BD y obtiene datos

// !!!!!!!!!!!!!!!!!


/*
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
}*/
?>