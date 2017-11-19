<!-- CABECERA -->
<?php
    session_start();
    
    $zonaPrivada = false;
    $urlLocal = "../";

	require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

    $query = "SELECT * FROM Fotos WHERE ";
    
    if($_POST['titulo'] != ""){
        $query .= "Titulo = '" . mysqli_real_escape_string($connectDB, $_POST['titulo']) ."'";  
        if($_POST['fecha'] != ""){
            $query .= " AND Fecha = '" . mysqli_real_escape_string($connectDB, $_POST['fecha']) ."'";  
            if($_POST['paises'] != ""){
                $query .= " AND Pais = '" . mysqli_real_escape_string($connectDB, $_POST['paises']) ."'";  
            }
        }
        else{
            if($_POST['paises'] != ""){
                $query .= " AND Pais = '" . mysqli_real_escape_string($connectDB, $_POST['paises']) ."'";  
            }
        }
    }
        else{
            if($_POST['fecha'] != ""){
                $query .= " Fecha = '" . mysqli_real_escape_string($connectDB, $_POST['fecha']) ."'";  
                if($_POST['paises'] != ""){
                    $query .= " AND Pais = '" . mysqli_real_escape_string($connectDB, $_POST['paises']) ."'";  
                }
            }
            else{
                if($_POST['paises'] != ""){
                    $query .= " Pais = '" . mysqli_real_escape_string($connectDB, $_POST['paises']) ."'";  
                }
            }
        }
    
    $result = mysqli_query($connectDB, $query);
    echo $query;
    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($result);
    }
    if ($row_cnt >= 1) {
    //success

        while($id = mysqli_fetch_assoc($result)) { 
            
                        $queryId = "SELECT NomPais FROM Paises where IdPais = '" . $id['Pais'] . "'";
                        $final = mysqli_query($connectDB, $queryId);
            
                        if(!$final){
                            die(mysqli_error($connectDB));
                        }
                        else{
                            $row = mysqli_num_rows($final);
                        }
                        if($row>=1){
                            //success x2
                            echo '<div class="card">';
                            while($fila = mysqli_fetch_assoc($final)){
                              
                                echo " <p>  
                                <h2>" . $id['Titulo'] . "</h2>
                                            <a href='" . $urlLocal . "zonaPrivada/infIMG.php'> 
                                            <img src='" . $urlLocal . $id['Fichero'] . "' /> 
                                        </a>
                                        <p>
                                            Fecha: " . $id['Fecha'] . "
                                        </p>
                                        <p>
                                            País: " . $fila['NomPais'] . "
                                        </p>
                                    </p>
                                ";
                            
                            }
                            echo "</div> ";
                        }
                    }
    } else {
    //Fail
        echo '<div class="card" ><p> No se han encontrado fotos con estos criterios de búsqueda. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);

    
?>
<!-- FIN CABECERA  ?> -->



<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->