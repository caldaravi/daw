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
    
        header("Location: " . $urlLocal . "zonaPrivada/infIMG.php");

    } else {
    //Fail
        echo '<div class="card" ><p> No se han encontrado fotos con estos criterios de búsqueda. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
    
?>
<!-- FIN CABECERA  ?> -->

    <main>
        <div class="card">
        <p>
            Mostrando resultados para
            <?php 
            if(isset($_GET['titulo'])){ $titulo=$_GET['titulo']; echo ' el título ' . $titulo ;} 
            if(isset($_GET['fecha'])){ $fecha=$_GET['fecha']; echo ' con la fecha ' . $fecha;}
            if(isset($_GET['pais'])){ $pais=$_GET['pais']; echo ' y el país ' . $pais;} 
            ?>
        </p>

        <h2>Título Imagen 1</h2>
        <?php echo '<a href="' . $urlLocal . 'zonaPrivada/infIMG.php?titulo='.$titulo.'&pais='.$pais.'&fecha='.$fecha.'&album=1&usuario=pepe">' ?>
            <img src="images/mountain.jpg" alt="Imagen">
        </a>
        <p>
            Fecha: <?php echo $fecha?>
        </p>
        <p>
            País: <?php echo $pais?>
        </p>
    </div>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->