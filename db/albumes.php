<?php

 $urlLocal = "../";

include_once($urlLocal . 'includes/funciones.php');
require_once('connect.php');

if($connectDB){
    $query = 
    "SELECT IdUsuario, Titulo, IdAlbum 
    FROM usuarios u, Albumes a
    WHERE userName = '" . mysqli_real_escape_string($connectDB, $_SESSION['username']) ."' 
    AND a.Usuario = u.IdUsuario";
    
    if(!($resultado = @mysqli_query($connectDB, $query))) { 
        echo "<p>Error al ejecutar la sentencia <b>$query</b>: " . mysqli_error($connectDB) . "</p>";
        exit; 
    } 
}
$result = mysqli_query($connectDB, $query);

 if (!$result) {
     die(mysqli_error($connectDB));
 }
 else{
     $row_cnt = mysqli_num_rows($result);
 }
 echo '<div class="card">';
 if ($row_cnt >= 1) {
 //success

while($res = mysqli_fetch_assoc($resultado)){
    $query2 = 'SELECT Fichero, FRegistro FROM Fotos WHERE Album = "' . $res['IdAlbum'] . '" ORDER BY FRegistro LIMIT 1';
    $response = $connectDB -> query($query2);
    if($response->num_rows>=1){
        $row = $response->fetch_array();
        getthumb($row['Fichero'],$urlLocal."images/Albumes");
        $thumbsource = $urlLocal."images/Thumbs/_thumb" . $row['Fichero']; 
        echo '<a href="' . $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $res["IdAlbum"] . '"><img src="'.$thumbsource.'"></a>';
        
    }
    echo '<p> <a href="' . $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $res["IdAlbum"] . '">' . $res['Titulo'] . '</a></p><br>'; 

    }
}else{
    echo 'No has creado ningún ábum todavía. 
    <p> <a href="' . $urlLocal . 'zonaPrivada/crearAlbum.php"> Crear álbum </a> </p>';
}
echo '</div>';

    mysqli_close($connectDB);

?>
