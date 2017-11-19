<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = true;
    $urlLocal = "../";

    require_once($urlLocal . "sesion/sesion.php");

    require_once($urlLocal . 'db/connect.php');

?>
<!-- FIN CABECERA  ?> -->

    <main>   
        
        <?php
 
 if($connectDB){
    $id = $_GET['id'];
    $query = "SELECT Fotos.Titulo a, Albumes.Titulo b, Fichero, IdFoto, NomPais, Fotos.Fecha, IdPais, userName 
    FROM Fotos, Paises, Albumes, Usuarios u
    WHERE Albumes.Usuario = u.IdUsuario AND Fotos.Album = Albumes.IdAlbum AND Fotos.IdFoto=$id AND Paises.IdPais=Fotos.Pais";
    
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
        while($fila = mysqli_fetch_assoc($result)) { 
            echo '
                <div class="card">
                
                <h2>' . $fila["a"] . ' </h2>
                <a href="' . $urlLocal . 'zonaPrivada/infIMG.php?id=' . $fila["IdFoto"] . '">
                    <img src="' . $urlLocal . $fila["Fichero"] . '" alt="Imagen"/>
                </a>
                <p>
                    Fecha: ' . $fila["Fecha"] . '
                </p>
                <p>
                    Páis: ' . $fila["NomPais"] . '
                </p>
                <p>
                    Usuario: ' . $fila["userName"] . '
                  
                 </p>
                 <p>
                   Álbum: ' . $fila["b"] . '
                </p>
                
                </div>
            ';
            
        }
    } else {
    //Fail
        echo '<div class="card" ><p> No se ha encontrado la información. </p></div>';     
        die();   
    }
    mysqli_close($connectDB);
}

        ?>
        
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
