<?php
    require_once('connect.php');

if($connectDB){
    $sentencia = 
    'SELECT IdPais, NomPais 
    FROM Paises 
    order by NomPais asc limit 10';
    
    if(!($resultado = @mysqli_query($connectDB, $sentencia))) { 
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($connectDB) . "</p>";
        exit; 
    } 
}
echo '<p><label>País: <select name="paises">'; 

// Recorre el resultado y lo muestra en forma de tabla HTML 
while($fila = mysqli_fetch_assoc($resultado)) { 
    echo '<option value="' . $fila['IdPais'] .' "> ' . $fila['NomPais'] .' </option>'; 
} 
echo '</select></label></p>';
// Libera la memoria ocupada por el resultado 
mysqli_free_result($resultado); 
// Cierra la conexión 
mysqli_close($connectDB);        
?>