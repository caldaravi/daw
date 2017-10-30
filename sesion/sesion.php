<?php  
    require_once('includes/config.inc.php');
    session_start();

    if(!$_SESSION['autentificado']){
        header('location: index.php');
        exit();
    }
?>