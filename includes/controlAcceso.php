<?php session_start(); 

    $usuario1 = 'carlos';   $pw1 = 'carlos';
    $usuario2 = 'marcos';   $pw2 = 'marcos';
    $usuario3 = 'admin';    $pw3 = 'admin';

    if(isset($_POST['username'])){
        if(($_POST['username'] == $usuario1 && $_POST['password'] == $pw1) || 
            ($_POST['username'] == $usuario2 && $_POST['password'] == $pw2) ||
            ($_POST['username'] == $usuario3 && $_POST['password'] == $pw3)){
            $_SESSION['username'] = $_POST['username'];
            include('includes/headerLogged.php');
            header("location: usuarioReg.php");
        }
        else{
            include('includes/header.php');
            ?> <p style="float: right;"> Usuario o contraseña incorrecta </p> <?php
        }
    } else {
        if(isset($_SESSION['username'])){
            include('includes/headerLogged.php');
        }
        else {
            include('includes/header.php');
        }
    }
?>