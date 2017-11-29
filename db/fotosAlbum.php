<?php

$user = $_SESSION['username'];
if(isset($_GET['id']))
    $id = $_GET['id'];
$idUser;

require_once('connect.php');

if($connectDB){
    $query = 
        "SELECT f.Titulo, a.Titulo, IdFoto, Fichero, f.Fecha, NomPais, u.userName 
        FROM Fotos f, Albumes a, Paises p, usuarios u
        WHERE a.IdAlbum = '$id' and f.Album = a.IdAlbum AND p.IdPais = f.Pais AND u.userName = '$user' AND a.Usuario = u.IdUsuario";


    $result = mysqli_query($connectDB, $query);
   
    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($result);
    }
    if ($row_cnt >= 1) {
    //success
    $fila = mysqli_fetch_assoc($result);
        if($fila['userName'] == $user){
            do {
                if($fila['userName'] != $user)
                    die("No puedes acceder al contenido de otro usuario");     
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
                
            }while($fila = mysqli_fetch_assoc($result));
        } else {
            echo 'No puedes acceder al contenido de otro usuario';
        }
    } else {
    //Fail
        echo '<div class="card" ><p> No hay fotos en este álbum. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}
?>