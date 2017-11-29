<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
    $sexo;
    $fecha;
    $ciudad;
    $pais;

    $destinourl = 'registro/nuevoReg.php';
    
    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
    
    include_once($urlLocal . '/includes/funciones.php');

    // Comprobamos usuario, fecha nac y sexo

    if( isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $duplicatesName = "SELECT userName FROM usuarios WHERE userName = '$usuario'";
        $result = mysqli_query($connectDB, $duplicatesName);
        if (!$result){
            die(mysqli_error($connectDB));
        }
        else{
            $row_cnt = mysqli_num_rows($result);
        }
        if ($row_cnt >= 1){
            error('El usuario escogido ya está en uso', 'registro/nuevoReg.php');
        }
         
        // username: sólo puede contener letras del alfabeto inglés (en mayúsculas y minúsculas) y números; longitud mínima 3 caracteres y máxima 15.
        if (preg_match('/[^A-Za-z0-9]/', $usuario) && !comprobarlong($usuario, 3, 15)){
            error('El nombre de usuario es incorrecto. Debe tener una longitud de entre 3 y 15 caracteres, contener al menos una mayúscula, una minuscula y un numero.', 'registro/nuevoReg.php');
        }

            // comprobamos contraseña
        if( isset($_POST["contrasena"]) && isset($_POST["contrasena2"]) ){
            $pass1 = $_POST["contrasena"];
            $pass2 = $_POST["contrasena2"];
        
            if($pass1 === $pass2){ 
                $pass1 = $pass2;
                setcookie("contrasena", $_POST['contrasena']);
            }
            else{
                error('Contraseñas no coinciden.', 'registro/nuevoReg.php');
            }
        }


        if( !isset($_POST["sexo"])){
            error('El sexo no ha sido escogido.', 'registro/nuevoReg.php');
        }
        else if(isset($_POST["sexo"])){
            $sexo = $_POST["sexo"];
            setcookie("sexo", $_POST['sexo']);
        }
        
        if (!isset($_POST["fecnacimiento"])){
            error('La fecha de nacimiento no ha sido escogida.', 'registro/nuevoReg.php');
        }
        else if(isset($_POST["fecnacimiento"])){
            $fecha = $_POST['fecnacimiento'];
            setcookie("FNacimiento", $_POST['fecnacimiento']);
        }
        setcookie("usuario", $_POST['usuario']);
        // Si usuario no esta cogido, cargamos la validacion del resto de datos (misma validacion para modificar datos excepto para el sexo, fnac y username)
        include_once($urlLocal . "db/validaciones.php");
        
        success($usuario, $email);

    }

    
?>
<!-- PÍE DE PÁGINA -->
<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
<?php
if(isset($_GET['reg'])){
    header("location: registroOK.php");
}