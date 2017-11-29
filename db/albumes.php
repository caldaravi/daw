<?php

 $urlLocal = "../";

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
    echo '<p> <a href="' . $urlLocal . 'zonaPrivada/verAlbum.php?id=' . $res["IdAlbum"] . '">' . $res['Titulo'] . '</a> </p>'; 
}
}else{
    echo 'No has creado ningún ábum todavía. 
    <p> <a href="' . $urlLocal . 'zonaPrivada/crearAlbum.php"> Crear álbum </a> </p>';
}
echo '</div>';

    mysqli_close($connectDB);

?>
