<?php 
    session_start();
    
    setcookie('username', null, -1, "/daw");
    setcookie("hour", null, -1, "/daw");
    setcookie("day", null, -1, "/daw");
    session_destroy();
    header('location: /daw/index.php');
?>