<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
      
    $destinourl = 'db/modificarPerfil.php';

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
    
    include_once($urlLocal . '/includes/funciones.php');
    if($_POST['contrasena'] == "" && $_POST['contrasena2'] == "" && $_POST['email'] == "" && $_POST['ciudad'] == ""){
        error('No se ha introducido ningun dato.', 'db/modificarPerfil.php');
    }
    $query = '';//'UPDATE usuarios set ';
    if($_POST['contrasena'] != "" && $_POST['contrasena2'] != ""){
        if(isset($_POST["contrasena"]) && isset($_POST["contrasena2"])){
            $contrasena = $_POST['contrasena'];
            setcookie("contrasena", $_POST['contrasena']);

            $contrasena2 = $_POST['contrasena2'];
            setcookie("contrasena2", $_POST['contrasena2']);
            if($contrasena === $contrasena2){
                $query .= 'userPass=' .$contrasena . ' ';
            }
            else{
                error('Contraseñas no coinciden', 'db/modificarPerfil.php');
            }
            // comprobar el resto de campos con validaciones.php
        }
        // comprobar el resto de campos con validaciones.php
    }
    else if($_POST['contrasena'] != "" || $_POST['contrasena2'] != ""){
        error('Contraseñas no coinciden', 'db/modificarPerfil.php');
    }

    include_once($urlLocal . "db/validaciones.php");
   
    
    // Si usuario no esta cogido, cargamos la validacion del resto de datos (misma validacion para modificar datos excepto para el sexo, fnac y username)
   // include_once($urlLocal . "db/validaciones.php");
    
    
?>
<!-- PÍE DE PÁGINA -->
<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
