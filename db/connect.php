<?php

    $database = parse_ini_file('config.ini');

 // Conecta con el servidor de MySQL 
 $connectDB = @mysqli_connect( 
    $database['Server'],    // El servidor 
    $database['User'],      // El usuario 
    $database['Password'],  // La contraseña 
    $database['Database']); // La base de datos 

if(!$connectDB) { 
echo "Error al conectar con la base de datos: " . mysqli_connect_error(); 
exit; 
}

?>