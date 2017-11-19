<?php

 $urlLocal = "../";

require_once('connect.php');

if($connectDB){
    $queryUsuario = "SELECT IdUsuario FROM usuarios WHERE userName = '" . mysqli_real_escape_string($connectDB, $_SESSION['username']) ."'";
    
    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");

    $queryid = mysqli_query($connectDB, $queryUsuario);
   
    if (!$queryid) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($queryid);
    }
    if ($row_cnt >= 1) {
    //success
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
                    echo "<div class='card'> <a href='" . $urlLocal . "zonaPrivada/verAlbum.php'>" . $res['Titulo'] . "</a></div>";
                }
            }
        }
    } else {
    //Fail
        echo '<div class="card" ><p> No se han encontrado albumes. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}
?>
