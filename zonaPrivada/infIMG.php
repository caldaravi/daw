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
                <div class="fotodetail">
                
                <h2 style="text-align: center;">' . $fila["a"] . ' </h2>
                <a style="margin: 0 auto;width: 50%;overflow: hidden; " href="' . $urlLocal . 'zonaPrivada/infIMG.php?id=' . $fila["IdFoto"] . '">
                    <img style="overflow: hidden;width: 100%;" src="' . $urlLocal . "images/Albumes/" . $fila["Fichero"] . '" alt="Imagen"/>
                </a>
                <p class="pCentrado">
                    Fecha: ' . $fila["Fecha"] . '
                </p>
                <p class="pCentrado">
                    País: ' . $fila["NomPais"] . '
                </p>
                <p class="pCentrado">
                    Usuario: ' . $fila["userName"] . '
                  
                 </p>
                 <p class="pCentrado">
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
