<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
    $usuario = $_COOKIE['usuario'];
    $contrasena = $_COOKIE['contrasena'];
    $email = $_COOKIE['email'];
    if(isset($_COOKIE['sexo'])){
        $sexo = $_COOKIE['sexo'];
    }
    if(isset($_COOKIE['ciudad'])){
        $ciudad = $_COOKIE['ciudad'];
    }
    if(isset($_COOKIE['pais'])){
        $pais = $_COOKIE['pais'];
    }
    if(isset($_COOKIE['fecnacimiento'])){
        $fecha = $_COOKIE['fecnacimiento'];
    }

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
?>
<!-- FIN CABECERA  ?> -->
<?php
    
    $query = "INSERT INTO usuarios(userName, userPass, userEmail, sexo, ciudad) 
                    VALUES('$usuario', '$contrasena', '$email', '$sexo', '$ciudad')";

    if ($connectDB->query($query) === TRUE) {
?>
        <div class="card">
        <p class="pCentrado">
            <?php echo "Te has registrado correctamente, inicia sesión para acceder al contenido privado.";?>
        </p>
        <div id="botones">
            <a class="vBtn" href=<?php echo $urlLocal . "index.php"?>>Inicio</a>
        </div>
    </div>
<?php
    } else {
     echo "<p>Something went wrong, try again later...</p>"; 
     exit;
    } 
    $connectDB->close();

    include_once($urlLocal . "includes/pie.php");
