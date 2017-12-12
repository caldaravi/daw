<!-- CABECERA -->
<?php
    session_start();

    $zonaPrivada = false;
    $urlLocal = "../";
      
    $destinourl = 'db/modificarPerfil.php';

    require_once($urlLocal . 'sesion/sesion.php');
    require_once($urlLocal . 'db/connect.php');
    include_once($urlLocal . '/includes/funciones.php');
?>
<!-- FIN CABECERA  ?> -->
<main>
    <?php 
    $contrasena='';
    $contrasena2='';
    $email='';
    
    $query = 'UPDATE usuarios set ';
    $passb = false;
    $datos = '';
    if($_POST['contrasena'] != "" && $_POST['contrasena2'] != ""){
        if(isset($_POST["contrasena"]) && isset($_POST["contrasena2"])){
            $contrasena = $_POST['contrasena'];
            $contrasena2 = $_POST['contrasena2'];
            if (preg_match('/[^A-Za-z0-9]/', $contrasena)){
                error('Contraseñas no contienen caracteres del alfabeto inglés, o al menos una mayúscula, una minúscula y un número.', 'db/modificarPerfil.php');
            }
            else if (!comprobarlong($contrasena, 6, 15)){
                error('Contraseña no comprendida entre 6 y 15 caracteres.', 'db/modificarPerfil.php');
            }
            else if($contrasena === $contrasena2){

                if(comprobarlong($contrasena, 6, 15)){
                    if( preg_match('/[A-Z]/', $contrasena) ){
                        if( preg_match('/[a-z]/', $contrasena) ){
                            if( preg_match('/[0-9]/', $contrasena) ){
                                setcookie("contrasena", $_POST['contrasena']);
                                setcookie("contrasena2", $_POST['contrasena2']);
                                $query .= 'userPass="' .$contrasena .'"';
                                $datos .= 'Guardada la nueva contraseña';
                                $passb = true;
                            }
                            else{
                                error('La contrasena no tiene un numero.', 'db/modificarPerfil.php');
                            }
                        }
                        else{
                            error('La contrasena no tiene una minuscula.', 'db/modificarPerfil.php');
                        }
                    }
                    else{
                        error('La contrasena no tiene una mayuscula.', 'db/modificarPerfil.php');
                    }
                } 
                else{
                    error('Contraseña demasiado corta.', 'db/modificarPerfil.php');
                }
            }
            else{
                error('Contraseñas no coinciden.', 'db/modificarPerfil.php');
            }
            // comprobar el resto de campos con validaciones.php
        }
        // comprobar el resto de campos con validaciones.php
    }
    else if($_POST['contrasena'] != "" || $_POST['contrasena2'] != ""){
        error('Contraseñas no coinciden.', 'db/modificarPerfil.php');
    }

    include_once($urlLocal . "db/validaciones.php");
   
    if(isset($email)){
        //echo $email;
        if($passb == true){
            if($email != ''){
                $query .= ', userEmail="' . $email .'"';
                $datos .= 'email: ' . $email . ' ';
            }
        }
        else{
            if($email != ''){
                $query .= ' userEmail="' . $email .'"';
                $datos .= 'email: ' . $email . ' ';
            }
        }
    }
    
    if(isset($ciudad)){
        //echo $ciudad;
        if($passb == true ){
            if($ciudad!=''){
                if($email != ''){
                    $query .= ', ciudad="' . $ciudad .'"';
                    $datos .= 'ciudad: ' . $ciudad . ' ';
                }
                else{
                    $query .= ' ciudad="' . $ciudad .'"';
                    $datos .= 'ciudad: ' . $ciudad . ' ';
                }
            }
        }
        else{
            if($ciudad!=''){
                if($email != ''){
                    $query .= ', ciudad="' . $ciudad .'"';
                    $datos .= 'ciudad: ' . $ciudad . ' ';
                }
                else{
                    $query .= ' ciudad="' . $ciudad .'"';
                    $datos .= 'ciudad: ' . $ciudad . ' ';
                }
            }
        }
    }
    // obtenemos el nombre del pais, pero necesitamos el id
    $paisnombre=$pais;

        if($connectDB){
            $sentencia = 
            "SELECT IdPais, NomPais 
            FROM Paises 
            WHERE NomPais = '".$pais."' ";
            
            if(!($resultado = @mysqli_query($connectDB, $sentencia))) { 
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($connectDB) . "</p>";
                exit; 
            } 
            $fila = mysqli_fetch_assoc($resultado);
            $pais = $fila['IdPais'];
        }
        if($pais!=0){
            
            if(isset($pais)){
                //echo $pais;
                
                if($passb == true){
                    if($pais != ''){
                        if($ciudad!=''){
                            if($email != ''){
                                $query .= ', Pais="' . $pais .'"';
                                $datos .= 'pais: ' . $paisnombre . ' ';
                            }
                            else{
                                $query .= ' Pais="' . $pais .'"';
                                $datos .= 'pais: ' . $paisnombre . ' ';
                            }
                        }
                        else{
                            $query .= ' Pais="' . $pais .'"';
                            $datos .= 'pais: ' . $paisnombre . ' ';
                        }
                    }
                }
                else{
                            
                    if($pais != ''){
                        if($ciudad!=''){
                            if($email != ''){
                                $query .= ', Pais="' . $pais .'"';
                                $datos .= 'pais: ' . $paisnombre . ' ';
                            }
                            else{
                                $query .= ' Pais="' . $pais .'"';
                                $datos .= 'pais: ' . $paisnombre . ' ';
                            }
                        }
                        else{
                            $query .= ' Pais="' . $pais .'"';
                            $datos .= 'pais: ' . $paisnombre . ' ';
                        }
                    }       
                }

            }
        
            // comprobamos todos los campos
            if($_POST['contrasena'] == "" && $_POST['contrasena2'] == "" && $_POST['email'] == "" && $_POST['ciudad'] == "" && (isset($_POST['paises']) && $_POST['paises']==0 )){
                error('No se ha introducido ningun dato.', 'db/modificarPerfil.php');
            } 
        }
        
        $query .= ' WHERE userName="' . $_COOKIE['username'] . '"';
        
        $update = mysqli_query($connectDB, $query);
       
        //echo $query;
        if (!$update) {//no entra aqui, entra en usuario
            
            error('Ha ocurrido un problema, intentelo de nuevo.','index.php');
            die(mysqli_error($connectDB));
        }
        else{
            error('Datos actualizados','zonaPrivada/usuarioReg.php');
        }
    
    mysqli_close($connectDB);
        
            // comprobamos todos los campos
            if($_POST['contrasena'] == "" && $_POST['contrasena2'] == "" && $_POST['email'] == "" && $_POST['ciudad'] == "" && (isset($_POST['paises']) && $_POST['paises']==0 )){
                error('No se ha introducido ningun dato.', 'db/modificarPerfil.php');
            } 
            

?>
<!-- PÍE DE PÁGINA -->
<?php include_once($urlLocal . "includes/pie.php"); ?>
<!-- FIN PÍE -->
