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
    include_once($urlLocal . '/includes/funciones.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
    
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
        if (preg_match('/[^A-Za-z0-9]/', $usuario) ){
            error('El nombre de usuario es incorrecto.', 'registro/nuevoReg.php');
        }
        if(preg_match('/\\s/', $usuario)){
            error('No son validos caracteres en blanco.','registro/nuevoReg.php');
        }
        if( !comprobarlong($usuario, 3, 15)){
            error('El nombre de usuario no esta comprendido entre 3 y 15 caracteres.','registro/nuevoReg.php');
        }

        // comprobamos contraseña
        if( isset($_POST["contrasena"]) && isset($_POST["contrasena2"]) ){
            $pass1 = $_POST["contrasena"];
            $pass2 = $_POST["contrasena2"];
            

            if($pass1 === $pass2){ 
                if(comprobarlong($pass1, 6, 15)){
                    if( preg_match('/[A-Z]/', $pass1) ){
                        if( preg_match('/[a-z]/', $pass1) ){
                            if( preg_match('/[0-9]/', $pass1) ){
                                $pass1 = $pass2;
                                setcookie("contrasena", $_POST['contrasena']);
                            }
                            else{
                                error('La contrasena no tiene un numero.', 'registro/nuevoReg.php');
                            }
                        }
                        else{
                            error('La contrasena no tiene una minuscula.', 'registro/nuevoReg.php');
                        }
                    }
                    else{
                        error('La contrasena no tiene una mayuscula.', 'registro/nuevoReg.php');
                    }
                } 
                else{
                    error('La contraseña debe tener un mínimo 6 carácteres y un máximo 15.', 'registro/nuevoReg.php');
                }
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
        

        // Si usuario validado correctamente al completo, procesamos su foto:
        

        // Guardamos variables que vienen del formulario, directamente
        // -- nombre del archivo:

        $path = $_FILES['image']['name'];
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $usuario . '.' . $extension;
        // -- ruta del archivo:
        $ruta = $urlLocal . "images/Perfiles/";

        // Comprobamos la foto de perfil
        $msgError = array(0 => "No hay error, el fichero se subió con éxito", 
        1 => "El tamaño del fichero supera la directiva 
        upload_max_filesize el php.ini", 
        2 => "El tamaño del fichero supera la directiva 
        MAX_FILE_SIZE especificada en el formulario HTML", 
        3 => "El fichero fue parcialmente subido", 
        4 => "No se ha subido un fichero", 
        6 => "No existe un directorio temporal", 
        7 => "Fallo al escribir el fichero al disco", 
        8 => "La subida del fichero fue detenida por la extensión"); 
        
        if($_FILES["image"]["error"] > 0) 
        { 
            echo "Error: " . $msgError[$_FILES["image"]["error"]] . "<br />"; 
            die();
        } 
        else 
        { 
            if(file_exists( $ruta . $filename ) )
            { 
                echo $filename . " ya existe";
            } 
            else 
            { 
                $destino = $ruta . $filename;

                move_uploaded_file($_FILES["image"]["tmp_name"], $destino);
            
            //echo "Almacenado en: " . $destino;

            setcookie("Foto", $filename);
            } 
        }
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