<?php
    require_once('connect.php');

if($connectDB){
    $query = 
    "SELECT IdUsuario, IdAlbum, a.Titulo 
    FROM usuarios u, Albumes a
    WHERE u.userName = '" . mysqli_real_escape_string($connectDB, $_SESSION['username']) . "' AND a.Usuario = u.IdUsuario";
    
    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");
    if(!($resultado = @mysqli_query($connectDB, $query))) { 
        echo "<p>Error al ejecutar la sentencia <b>$query</b>: " . mysqli_error($connectDB) . "</p>";
        exit; 
    } 
}
echo '<p><label>Álbum: <select name="albumes">'; 

    while($res = mysqli_fetch_assoc($resultado)){
        echo '<option value="' . $res['IdAlbum'] .' "> ' . $res['Titulo'] .' </option>'; 
    } 

    echo '</select></label></p>';
    
// Libera la memoria ocupada por el resultado 
mysqli_free_result($resultado);    
?>