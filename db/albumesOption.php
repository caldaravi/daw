<?php
    require_once('connect.php');

if($connectDB){
    $queryUsuario = "SELECT IdUsuario FROM usuarios WHERE userName = '" . mysqli_real_escape_string($connectDB, $_SESSION['username']) ."'";
    $queryid = mysqli_query($connectDB, $queryUsuario);
   
    if (!$queryid) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($queryid);
    }
    if ($row_cnt >= 1) {
        //success

        echo '<p><label>Álbum a escoger: <select name="albumes">'; 
            while($id = mysqli_fetch_assoc($queryid)) { 
    
                $query = "SELECT Titulo FROM Albumes where Usuario = '" . $id['IdUsuario'] . "'";
                $result = mysqli_query($connectDB, $query);
    
                if(!$result){
                    die(mysqli_error($connectDB));
                }
                else{
                    $row = mysqli_num_rows($result);
                }
                if($row>=1){
                    //success x2
                    while($res = mysqli_fetch_assoc($result)){
                        echo '<option value="' . $res['IdAlbum'] .' "> ' . $res['Titulo'] .' </option>'; 
                    } 
                    
                }
                
            }
            echo '</select></label></p>';
        }




    $sentencia = 'SELECT * FROM Albumes';
    if(!($resultado = @mysqli_query($connectDB, $sentencia))) { 
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($connectDB); 
        echo '</p>'; 
        exit; 
    } 
}
// Libera la memoria ocupada por el resultado 
mysqli_free_result($resultado); 
// Cierra la conexión 
mysqli_close($connectDB);        
?>