<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');

    $usuario = $_COOKIE['usuario'];
    $contrasena = $_COOKIE['contrasena'];
    $email = $_COOKIE['email'];
    if(isset($_COOKIE['sexo'])){
        $sexo = $_COOKIE['sexo'];
    }
    if(isset($_COOKIE['ciudad'])){
        $ciudad = $_COOKIE['ciudad'];
    }
    if(isset($_COOKIE['Pais'])){
        $pais = $_COOKIE['Pais'];
    }
    if(isset($_COOKIE['FNacimiento'])){
        $fecha = $_COOKIE['FNacimiento'];
    }
    if(isset($_COOKIE['Foto'])){
        $Foto = $_COOKIE['Foto'];
    }
?>
<!-- FIN CABECERA  ?> -->
<?php



    
    $query = "INSERT INTO usuarios(userName, userPass, userEmail, sexo, ciudad, FNacimiento, Foto, Pais) 
                    VALUES('$usuario', '$contrasena', '$email'";
    
    //agregando los campos opcionales a la query
    if(isset($_COOKIE['sexo']))
        $query .= ", '$sexo'";
    else
        $query .= ", null";
    if(isset($_COOKIE['ciudad']))
        $query .= ", '$ciudad'";
    else
        $query .= ", null";
    if(isset($_COOKIE['FNacimiento']))
        $query .= ", '$fecha'";
    else
        $query .= ", null";
    if(isset($_COOKIE['Foto']))
        $query .= ", '$foto'";
    else
        $query .= ", null";
    if(isset($_COOKIE['Pais']))
        $query .= ", '$pais'";
    else
        $query .= ", null";
    
    $query .= ")";//cerramos query

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
     echo "error: " . mysqli_error($connectDB) . "<br>";
     echo "errno: " . mysqli_errno($connectDB);
     exit;
    } 

    $connectDB->close();

    include_once($urlLocal . "includes/pie.php");

    //BORRAR cookies utilizadas para registro

    setcookie("usuario", "", time() - 3600, "/daw/registro");
    setcookie("contrasena", "", time() - 3600, "/daw/registro");
    setcookie("email", "", time() - 3600, "/daw/registro");
    setcookie("sexo", "",time() - 3600, "/daw/registro");
    setcookie("ciudad","", time() - 3600, "/daw/registro");
    setcookie("FNacimiento","", time() - 3600, "/daw/registro");
    setcookie("Foto","", time() - 3600, "/daw/registro");
    setcookie("Pais","", time() - 3600, "/daw/registro");