<?php 
    session_start();
    setcookie("username", $_SESSION['username'], time()+3600);
?>