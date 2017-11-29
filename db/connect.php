<?php

    $database = parse_ini_file('config.ini');

 // Conecta con el servidor de MySQL 
 $connectDB = @mysqli_connect( 
    $database['Server'],    // El servidor 
    $database['User'],      // El usuario 
    $database['Password'],  // La contraseña 
    $database['Database']); // La base de datos 
    
    mysqli_query($connectDB,"SET CHARACTER SET 'utf8'");
    mysqli_query($connectDB,"SET SESSION collation_connection ='utf8_bin'");
    
    if(!$connectDB) { 
        echo "Error al conectar con la base de datos: " . mysqli_connect_error(); 
        exit; 
    }

?>