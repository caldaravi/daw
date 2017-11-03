<?php
$user = parse_ini_file('config.ini');
 require_once('connect.php');
 include_once('../respuestaNuevoReg.php');

/*
 if(isset($_POST['contrasena'])){
    $pass1 = $_POST["contrasena"];
 }
 else{
     echo "not pass";
 }
 if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'] ;
 }
 else{
    echo "not usuario";
}
 if(isset($_POST['email'])){
    $email = $_POST["email"];
 }
 else{
    echo "not email";
}
 if(isset($_POST['sexo'])){
    $sexo = $_POST["sexo"];
 }
 else{
    echo "not sexo";
}
 if(isset($_POST['ciudad'])){
    $ciudad = $_POST['ciudad'];
 }
 else{
    echo "not ciudad";
}

$usuario = $user['usuario'];
$pass1 = $user['pass1'];
$email = $user['email'];
$ciudad = $user['ciudad'];
$sexo = $user['sexo'];
*/

$query = "INSERT INTO usuarios(userName,userEmail,userPass, sexo, ciudad) VALUES('$usuario','$email','$pass1', '$sexo', '$ciudad')";
if ($link->query($query) === TRUE) {
    printf("Se creó con éxtio el usuario.\n");
    header('/daw/index.php');
} else {
 echo "Something went wrong, try again later..."; 
} 
$link->close();
?>