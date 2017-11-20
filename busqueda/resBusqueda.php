<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

if($connectDB){
    $query = 
        "SELECT f.Titulo, IdFoto, Fichero, f.Fecha, NomPais 
        FROM Fotos f, Paises p
        WHERE p.IdPais = f.Pais ";

    if($_POST['titulo'] != ""){
        $query .= "AND f.Titulo LIKE '%" . $_POST['titulo'] . "%' ";
    }
    if($_POST['fecha'] != ""){
        $query .= "AND f.Fecha = '" . $_POST['fecha'] . "'"; 
    }
    if($_POST['paises'] != ""){
        $query .= "AND f.Pais = '" . $_POST['paises'] . "'"; 
    }

    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");

    $result = mysqli_query($connectDB, $query);
   
    if (!$result) {
        die(mysqli_error($connectDB));
    }
    else{
        $row_cnt = mysqli_num_rows($result);
    }
    if ($row_cnt >= 1) {
    //success
        echo "Se han encontrado " . $row_cnt . " resultados con estos criterios de búsqueda.";
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
        echo '<div class="card" ><p> No hay fotos con este criterio de búsqueda. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}
?>